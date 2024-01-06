{
  description = "A flake for building Hello World";

  inputs.nixpkgs.url = "github:NixOS/nixpkgs/nixos-23.11";
  # inputs.flake-parts.url = "github:hercules-ci/flake-parts";

  outputs = {self, nixpkgs}: let
      lib = nixpkgs.lib;
      pkgs = nixpkgs.legacyPackages."aarch64-darwin";
    in {
      packages."aarch64-darwin".default = pkgs.php.buildComposerProject {
        src = ./.;

        pname = "zuschuss-vordruck";
        version = "1.0.0";

        vendorHash = "sha256-MHE7FUHRSz/WckvW3MiSR/CcZrr99jebEuPLXSTunmo=";
      };
  };
}
