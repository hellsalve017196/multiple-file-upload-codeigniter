public function file($dir)
    {
        $data = array();

        $files = $_FILES;
        $file_length = sizeof($_FILES['userfile']['name']);

        for($i = 0; $i < $file_length; $i++)
        {
            $_FILES['userfile']['name']= $files['userfile']['name'][$i];
            $_FILES['userfile']['type']= $files['userfile']['type'][$i];
            $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
            $_FILES['userfile']['error']= $files['userfile']['error'][$i];
            $_FILES['userfile']['size']= $files['userfile']['size'][$i];

            $config['upload_path'] = './'.$dir.'/';
            $config['allowed_types'] = '*';
            $config['encrypt_name'] = TRUE;

            $this->load->library('upload', $config);

            if($this->upload->do_upload())
            {
                $data[] = $this->upload->data();
            }
        }

        return $data;
    }