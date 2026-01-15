<?php

session_start();
session_unset();
session_destroy();

header("Location: PAGINAWEB-5/index.html");