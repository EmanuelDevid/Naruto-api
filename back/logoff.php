<?php

//ininciando uma sessão
session_start();

//destruindo a sessão
session_destroy();

//redireciona para a tela inicial
header("Location: ../index.html");