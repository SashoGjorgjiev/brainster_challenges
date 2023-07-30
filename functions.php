<?php

function usernameUnique( string $username):bool {
    $usersData=file_get_contents("users.txt");
    $users = explode(PHP_EOL,$usersData);

    foreach($users as $user){
        $credentials = explode('=',$user);
    if($credentials[0] === $username)  {
      return  false;
    }
}
  return true ;
}
function emailUnique(string $email): bool {
    $usersEmailData = file_get_contents("usersEmail.txt");
    $usersEmail = explode(PHP_EOL, $usersEmailData);

    foreach ($usersEmail as $userEmailData) {
        if (!empty($userEmailData)) {
            list($storedEmail, $userData) = explode(',', $userEmailData);
            list($storedUsername, $hashedPassword) = explode('=', $userData);

            if ($storedEmail === $email) {
                return false; // Email is not unique
            }
        }
    }

    return true; // Email is unique
}





function isRequired($value): bool {
    return !empty(trim($value));
}

function isValidUsername($username): bool {
    return preg_match('/^[a-zA-Z0-9]+$/', $username);
}

function isValidEmail($email): bool {
    return filter_var($email, FILTER_VALIDATE_EMAIL) && strpos($email, '@') >= 5;
}

function isValidPassword($password): bool {
    // Password must have at least one number, one special sign, and one uppercase letter
    return preg_match('/^(?=.*\d)(?=.*[!@#$%^&*])(?=.*[A-Z]).{8,}$/', $password);
}
