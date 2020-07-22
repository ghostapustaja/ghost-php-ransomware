# ghost-php-ransomware

This is a very minimal ransomware written in php which can be used to encrypt the webroot of any server with AES-256 twice(with two keys)

#Encrypt To encrypt a website, upload the encrypt.php to the webserver, and then edit(with text editor) the 'invoker.html' and change the POST address to encrypt.php(which you uploaded)

Then open the 'Invoker.html' with any browser and enter the 'Key 1, Key 2 & IV' with appropriate values(The keys you want to encrypt the webserver with, IV stands for 'initialization vector' which is needed in cryptography) and click submit

In the next some moments, the whole webserver will be double encrypted, first with 'key 1' and then with 'key 2'

#Decrypt To decrypt the encrypted webserver, upload the decrypt.php to the webserver and then edit(with text editor) the 'invoker.html' to change the post address to decrypt.php(which you uploaded)

Then open 'Invoker.html' and enter the appropriate key values(The same ones used to encrypt the webserver or it can lead to data loss) and click submit

In the next some moments, the webserver will be decrypted
