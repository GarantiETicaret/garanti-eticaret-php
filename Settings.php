<?php

    class Settings
    {      
        public function Settings()
        {
            $this->Version="V0.1";// Sabit Kalmalı 
            $this->Mode="Test";// Kullandığınız ortama göre değiştirmelisiniz. 
            $this->BaseUrl="https://sanalposprovtest.garanti.com.tr/VPServlet"; //Test Adresi  // Üretim otamına geçtiğinizde adresi değiştirmelisiniz. 
            $this->Password="123qweASD/";//Kendi şifreniz ile değiştirmelisiniz. 
        
        }

        public $Mode;
        public $Version;
        public $BaseUrl;
        public $Password;
    }