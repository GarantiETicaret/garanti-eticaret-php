<?php

    class Settings3D
    {      
        public function Settings3D()
        {
            $this->apiversion="V0.1";// Sabit Kalmalı 
            $this->mode="Test";// Kullandığınız ortama göre değiştirmelisiniz. 
            $this->BaseUrl="https://sanalposprovtest.garanti.com.tr/servlet/gt3dengine"; //Test Adresi  // Üretim otamına geçtiğinizde adresi değiştirmelisiniz. 
            $this->Password="123qweASD/";//Kendi şifreniz ile değiştirmelisiniz. 
        
        }

        public $mode;
        public $apiversion;
        public $BaseUrl;
        public $Password;
    }