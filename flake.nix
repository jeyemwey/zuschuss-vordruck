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
        packages.default = pkgs.php.buildComposerProject {
          src = builtins.filterSource (path: type:
            !(type == "directory" && (baseNameOf path == "vendor"
              || baseNameOf path == ".idea" || baseNameOf path == "result")))
            ./.;

          pname = "zuschuss-vordruck";
          version = "1.0.0";

          vendorHash = "sha256-MHE7FUHRSz/WckvW3MiSR/CcZrr99jebEuPLXSTunmo=";
        };
      });
}
