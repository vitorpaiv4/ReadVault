<?php

unset($_SESSION['auth']);

flash()->push('message', 'You have been signed out successfully.');

header('Location: /');

exit();
