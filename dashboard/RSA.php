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
$privateKey = "MIIFLTBXBgkqhkiG9w0BBQ0wSjApBgkqhkiG9w0BBQwwHAQIXoKjrRimlwoCAggA
MAwGCCqGSIb3DQIJBQAwHQYJYIZIAWUDBAEqBBBqPsrXc//z6v7c5Zz2ORjHBIIE
0MA5ablLrhkYOfW+sICVABVsGNRZesqHBhePZOhJbH1e/lBFlniFumjhA5qSe+ZC
KyubqwknGSdgmT5yV2yLEy6l5yA/hDr1nkyMRo0Bwz7ZysMQyJB7N37LKvcxnIxv
l12ykY0U7kHIdxJuRMIurp7ikYFSpNUdNwl/VrCg62UgIsjApf1juAqxSmsB7Iov
crJ5hqyHp3LYhlGzD3klnT/YYAZEOJVkgOKAuCV/306fgoUGbW6y094gqUXuhcfe
VCUOz7ZGtPmpJBsvzEacDGQKaJ7eoprG+5ylAInHp55cwwwKsyrsoBsc+Og0EtvC
F9ZAXQdVOI8jbTnpvQkUqYXQy3qx6Nyfv+WXVO4FAiufWfmUoONIduwCaqo1LVm9
+X5+EJ8ntbq/rxCYIffdWj83KbTN2FaN7gjr+AegS8+cPXZmexpxPBJGIMb2c43A
XYjp0eJEqrz0gLbFefPnKnCQTPLvDxb5vEoxRbDE2aQg29dENE7VfaJVMIelL32T
qEsko5NsKyP1cmW6rP6kx0X/mUyciWKQ5cPNTevAvDzaQ40/b/iGvp8UvU+iw5ht
5UDNWfsJC4BoDxcI0ASnogtBLZu1HMO7sFePlx1//eF/yrw/B46zAQen0WCa/tGk
BvS85v6neWsshS8VWEqrCBxmRFZRz0VJnbeyx/gBBVJ2BzmPW7wxpgtOe/YYwcw2
RylrsrpasjF2Xo3zFr8qIRPNydE7Iv84xtOSfIJLHb1KPU2U+DoNPnnbrYMrpexx
PmJMISNJz/4ad/35Nk0ysRdPSu2/Pbsk4ZEXVLifJ749YeaSbn0lkqJoj2AjejMx
7EfQN/c+wocnLSHWEu9oRC5IeYFBvGTj4eA7QG3wfq1NLuEJ7JF/RCaj1BPPqpJN
YwOMz9AMXArbDVkuX96plA7bUuQHUno0ISUKi1jA7JTYH6Xjuc9naiCX9WNSuHSa
NNabcIOGwyJd/ZEmpcOWukPTDIjzcLHLEvui+ZC9SLcAf68b3CSy/+xfzhYXMS7I
90CL7VkRt5aUsS7XXDGw2GIZKwBCER0ZoqU1vDhdEIbBsYDKxftfS6QvD900eMbR
//ex9lpsn8l4sNf4ilQ4U5O4yqeeXqsv/Xdf9e3EIfV7mjPBETkSEcrP9LeN0BZt
CmK2rXPr/812s2xigZuuTTuzs1UpcCVM0dJv8FWvDTodjKv8SdOVI0KNlX62R4qq
RLLIhJ3vv0ttQtoqVbJ/yHfKrOiECMZp67K9sNelUhThthGTTm98M5h8l3NacZXp
SzjjJF9035vk7EEpkp5Komx1R8pP8MgHYtFOVl1xT3PHIF4DfS/Zr9A7P/mmi+wM
7/5XI0ZKM6EGc8a6ByxxJBKdK5XBzPeFqDcl+djF2B1bVObTIRXYyooiZsB+BJSD
lJqzMG7ELLJISDaTJsoXLvSK2GA9t1Ci4hIiHrNTVKaqVrq3KqyOls6v8dn6LrmY
QnVx1JwPhS74yjy+iXfeoK+oJXT395SFKUqyrpryuTnydjnxMgHgNWbaMJNCtd3i
zrU2dnvsjRDvLfSbjHuXYhfodvb/VKCxfMN09qxL1vid948NUAlY3yqiItKmlszY
aq51Gl0/KRsPVcbPRU90lW0x4fPtojHzuG85E72TESCu";
$publicKey = "-----BEGIN PUBLIC KEY-----\n...Your public key here...\n-----END PUBLIC KEY-----";

$rsa = new RSA($publicKey, $privateKey);

$encrypted = $rsa->encrypt("Hello, world!");
echo "Encrypted: $encrypted\n";

$decrypted = $rsa->decrypt($encrypted);
echo "Decrypted: $decrypted\n";
?>
