<?php
class RSA {
    private $publicKey;
    private $privateKey;

    // Constructor now takes RSA keys instead of AES key and IV
    public function __construct($publicKey, $privateKey) {
        $this->publicKey = $publicKey;
        $this->privateKey = $privateKey;
    }

    // RSA encryption method
    public function encrypt($data) {
        openssl_public_encrypt($data, $encryptedData, $this->publicKey);
        return base64_encode($encryptedData);
    }

    // RSA decryption method
    public function decrypt($encryptedData) {
        openssl_private_decrypt(base64_decode($encryptedData), $decryptedData, $this->privateKey);
        return $decryptedData;
    }
}

// Example usage
$privateKey = "-----BEGIN PRIVATE KEY-----\n...Your private key here...\n-----END PRIVATE KEY-----";
$publicKey = "-----BEGIN PUBLIC KEY-----\n...Your public key here...\n-----END PUBLIC KEY-----";

$rsa = new RSA($publicKey, $privateKey);

$encrypted = $rsa->encrypt("Hello, world!");
echo "Encrypted: $encrypted\n";

$decrypted = $rsa->decrypt($encrypted);
echo "Decrypted: $decrypted\n";
?>
