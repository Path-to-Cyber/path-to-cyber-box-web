
#Path to cyber 

<h1>Box web :</h1>
<h2>Path transversale</h2>
On voit une faille include au niveau de la page login.php (index.php) dans le form action index.php?home=login.php
http://127.0.0.1/box/index.php?home=/etc/passwd

<h2>SQL injection</h2>
Le champs login et password sont vulnérable au injection sql on peux se connecter en root avec  ```
``` sql
' or 1 = 1 /*
```

<h2>ENUM</h2>
Lors de l'affichage des message on ne verifie pas qui est le propriétaire on peux donc tester toute les url pour tombée sur la bonne (script python).
http://127.0.0.1/box/view_message.php?id=589

<li>SQL</li>

``` sql
CREATE TABLE users (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    username TEXT NOT NULL,
    password TEXT NOT NULL
);

CREATE TABLE messages (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    user_id INTEGER NOT NULL,
    message TEXT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

BEGIN TRANSACTION;
INSERT INTO users (username, password) VALUES ('root', 'papszdazfrefaeef');
INSERT INTO messages (user_id, message) VALUES ((SELECT id FROM users WHERE username = 'root'), 'FLAG IS SECRET');
COMMIT;

BEGIN TRANSACTION;
INSERT INTO users (username, password) VALUES ('VeryAdm1nSecure', 'papadazdaizod');
INSERT INTO messages (user_id, id, message) VALUES ((SELECT id FROM users WHERE username = 'admin'), 589,'superFlag');
COMMIT;

```
