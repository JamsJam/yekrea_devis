<?php
require_once('Models/adminModel.php');

$devis = getAllDevis();

include('Views/dashboard.php');