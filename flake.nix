{
  description = "A flake for building Hello World";

  inputs.nixpkgs.url = "github:NixOS/nixpkgs/nixos-23.11";
  inputs.flake-utils.url = "github:numtide/flake-utils";

  outputs = { self, nixpkgs, flake-utils }:
    flake-utils.lib.eachDefaultSystem (system:
      let
        pkgs = nixpkgs.legacyPackages.${system};
        lib = nixpkgs.lib;
      in {
        packages.default = pkgs.php.buildComposerProject rec {
          src = builtins.filterSource (path: type:
            !(type == "directory" && (baseNameOf path == "vendor"
              || baseNameOf path == ".idea" || baseNameOf path == "result")))
            ./.;

          pname = "zuschuss-vordruck";
          version = "1.0.0";

          vendorHash = "sha256-feb1N1arY5famy9GYI09TF4ynH1b0nqtM7xCncA0CVI=";
          postInstall = ''
            rm -R $out/share/php/${pname}/bootstrap/cache
            # Move static contents for the NixOS module to pick it up, if needed.
            mv $out/share/php/${pname}/bootstrap $out/share/php/${pname}/bootstrap-static
            mv $out/share/php/${pname}/storage $out/share/php/${pname}/storage-static
            ln -s /var/lib/${pname}/.env $out/share/php/${pname}/.env
            ln -s /var/lib/${pname}/storage $out/share/php/${pname}/
            ln -s /var/lib/${pname}/storage/app/public $out/share/php/${pname}/public/storage
            # ln -s /var/lib/${pname}-bootstrap $out/share/php/${pname}/bootstrap
            chmod +x $out/share/php/${pname}/artisan
          '';
        };
      });
}
