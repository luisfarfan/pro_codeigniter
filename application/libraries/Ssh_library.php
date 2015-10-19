<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Sftp_library
 *
 * @author lfarfan
 */
class Ssh_library {

    public function connect_ssh($server) {

        $con = ssh2_connect($server, 22);
        return $con;
    }

}
