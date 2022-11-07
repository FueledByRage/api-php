<?php
require_once './src/DTOs/userDTO.php';


class User{
    private string $username;
    private string $email;
    private string $password;
    private string $about;
    private string $profileURL;
    
    function __construct( UserInputDTO $dto ){
        $this->DTOToUser($dto);
    }

    function DTOToUser( UserInputDTO $userDto ){
        $this->setUsername($userDto->username);   
        $this->setEmail($userDto->email);
        $this->setPassword($userDto->password);
        $this->setAbout($userDto->about);
        $this->setProfileURL($userDto->profileURL);     
    }

    /**
     * Get the value of username
     */ 
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set the value of username
     *
     * @return  self
     */ 
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of about
     */ 
    public function getAbout()
    {
        return $this->about;
    }

    /**
     * Set the value of about
     *
     * @return  self
     */ 
    public function setAbout($about)
    {
        $this->about = $about;

        return $this;
    }

    /**
     * Get the value of profileURL
     */ 
    public function getProfileURL()
    {
        return $this->profileURL;
    }

    /**
     * Set the value of profileURL
     *
     * @return  self
     */ 
    public function setProfileURL($profileURL)
    {
        $this->profileURL = $profileURL;

        return $this;
    }
}