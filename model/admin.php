<?php 
    class Admin {
        //Atributos, siempre en privado
        private $id_admin;
        private $passwd_admin;
        private $email_admin;

        //Constructor
        public function __construct($email_admin,$passwd_admin){
            $this->email_admin=$email_admin;
            $this->passwd_admin=$passwd_admin;
        }
        
     function getIdAdmin()
    {
        return $this->id_admin;
    }

    /**
     * @param mixed $id_admin
     *
     * @return self
     */
    public function setIdAdmin($id_admin)
    {
        $this->id_admin = $id_admin;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPasswdAdmin()
    {
        return $this->passwd_admin;
    }

    /**
     * @param mixed $passwd_admin
     *
     * @return self
     */
    public function setPasswdAdmin($passwd_admin)
    {
        $this->passwd_admin = $passwd_admin;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmailAdmin()
    {
        return $this->email_admin;
    }

    /**
     * @param mixed $email_admin
     *
     * @return self
     */
    public function setEmailAdmin($email_admin)
    {
        $this->email_admin = $email_admin;

        return $this;
    }
}