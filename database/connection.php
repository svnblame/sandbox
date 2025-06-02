<?php

$db_auth = config('auth.db');
return new PDO($db_auth['dsn'], $db_auth['username'], $db_auth['password']);
