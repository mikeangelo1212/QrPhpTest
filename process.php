<?php

function xd(){
        require 'env.php';//with putenv()

        // Store a string into the variable which
        // need to be Encrypted
        $simple_string = "Welcome to GeeksforGeeks\n";

        // Display the original string
        echo "Original String: " . $simple_string;

        // Store the cipher method
        $ciphering = "AES-128-CTR";

        // Use OpenSSl Encryption method
        $iv_length = openssl_cipher_iv_length($ciphering);
        $options = 0;

        // Non-NULL Initialization Vector for encryption
        $iv = openssl_random_pseudo_bytes(
                openssl_cipher_iv_length($ciphering));

        // Store the encryption key
        $encryption_key = getenv("ENCRYPTION_KEY");

        // Use openssl_encrypt() function to encrypt the data
        $encryption = openssl_encrypt($simple_string, $ciphering,
                        $encryption_key, $options, $iv);

        // Display the encrypted string
        echo "Encrypted String: " . $encryption . "\n";

        // Store the decryption key
        $decryption_key = getenv("ENCRYPTION_KEY");

        // Use openssl_decrypt() function to decrypt the data
        $decryption=openssl_decrypt ($encryption, $ciphering, 
                $decryption_key, $options, $iv);

        // Display the decrypted string
        echo "Decrypted String: " . $decryption;
        
}


?>
