<?php
	class Alumno {
		private $id_alumno;
		private $nombre_alumno;
		private $apellido1_alumno;
		private $apellido2_alumno;
		private $grupo_alumno;
		private $email_alumno;
		private $passwd_alumno;

		public function __construct($nombre_alumno,$apellido1_alumno,$apellido2_alumno,$grupo_alumno, $email_alumno,$passwd_alumno){
			$this->nombre_alumno=$nombre_alumno;
			$this->apellido1_alumno=$apellido1_alumno;
			$this->apellido2_alumno=$apellido2_alumno;
			$this->grupo_alumno=$grupo_alumno;
			$this->email_alumno=$email_alumno;
			$this->passwd_alumno=$passwd_alumno;
		}
		
	
    /**
     * @return mixed
     */
    public function getIdAlumno()
    {
        return $this->id_alumno;
    }

    /**
     * @param mixed $id_alumno
     *
     * @return self
     */
    public function setIdAlumno($id_alumno)
    {
        $this->id_alumno = $id_alumno;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getNombreAlumno()
    {
        return $this->nombre_alumno;
    }

    /**
     * @param mixed $nombre_alumno
     *
     * @return self
     */
    public function setNombreAlumno($nombre_alumno)
    {
        $this->nombre_alumno = $nombre_alumno;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getApellido1Alumno()
    {
        return $this->apellido1_alumno;
    }

    /**
     * @param mixed $apellido1_alumno
     *
     * @return self
     */
    public function setApellido1Alumno($apellido1_alumno)
    {
        $this->apellido1_alumno = $apellido1_alumno;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getApellido2Alumno()
    {
        return $this->apellido2_alumno;
    }

    /**
     * @param mixed $apellido2_alumno
     *
     * @return self
     */
    public function setApellido2Alumno($apellido2_alumno)
    {
        $this->apellido2_alumno = $apellido2_alumno;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getGrupoAlumno()
    {
        return $this->grupo_alumno;
    }

    /**
     * @param mixed $grupo_alumno
     *
     * @return self
     */
    public function setGrupoAlumno($grupo_alumno)
    {
        $this->grupo_alumno = $grupo_alumno;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmailAlumno()
    {
        return $this->email_alumno;
    }

    /**
     * @param mixed $email_alumno
     *
     * @return self
     */
    public function setEmailAlumno($email_alumno)
    {
        $this->email_alumno = $email_alumno;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPasswdAlumno()
    {
        return $this->passwd_alumno;
    }

    /**
     * @param mixed $passwd_alumno
     *
     * @return self
     */
    public function setPasswdAlumno($passwd_alumno)
    {
        $this->passwd_alumno = $passwd_alumno;

        return $this;
    }
}

?>