<?php

//ininciando uma sessão
session_start();

//destruindo a sessão, ou seja, a super global SESSION
session_destroy();

//redireciona para a tela inicial
header("Location: ../views/index.html");