<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Import extends CI_Controller
{

    public function index()
    {
        $data['title'] = 'Import Excel';
        $data['student'] = $this->db->get('student')->result();
        $this->load->view('import/index', $data);
    }

    public function create()
    {
        $data['title'] = "Upload File Excel";
        $this->load->view('import/create', $data);
    }

    public function excel()
    {
        if (isset($_FILES["file"]["name"])) {
            // upload
            $file_tmp = $_FILES['file']['tmp_name'];
            $file_name = $_FILES['file']['name'];
            $file_size = $_FILES['file']['size'];
            $file_type = $_FILES['file']['type'];
            // move_uploaded_file($file_tmp,"uploads/".$file_name); // simpan filenya di folder uploads

            $object = PHPExcel_IOFactory::load($file_tmp);

            foreach ($object->getWorksheetIterator() as $worksheet) {

                $highestRow = $worksheet->getHighestRow();
                $highestColumn = $worksheet->getHighestColumn();

                for ($row = 4; $row <= $highestRow; $row++) {

                    $nis = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                    $nisn = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                    $name = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                    $gender = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                    $bornplace = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                    $borndate = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
                    $phone = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
                    $hobby = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
                    $adress = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
                    $mother = $worksheet->getCellByColumnAndRow(9, $row)->getValue();
                    $father = $worksheet->getCellByColumnAndRow(10, $row)->getValue();
                    $parentphone = $worksheet->getCellByColumnAndRow(11, $row)->getValue();
                    $class = $worksheet->getCellByColumnAndRow(12, $row)->getValue();

                    $data[] = array(
                        'student_nis'          => $nis,
                        'student_nisn'          => $nisn,
                        'student_full_name'         => $name,
                        'student_gender'          => $gender,
                        'student_born_place'          => $bornplace,
                        'student_born_date'         => $borndate,
                        'student_phone'          => $phone,
                        'student_hobby'          => $hobby,
                        'student_adress'         => $adress,
                        'student_name_of_mother'          => $mother,
                        'tudent_name_of_father'          => $father,
                        'student_parent_phone'         => $parentphone,
                        'class_class_id'         => $class,
                    );
                }
            }

            $this->db->insert_batch('student', $data);

            $message = array(
                'message' => '<div class="alert alert-success">Import file excel berhasil disimpan di database</div>',
            );

            $this->session->set_flashdata($message);
            redirect('import');
        } else {
            $message = array(
                'message' => '<div class="alert alert-danger">Import file gagal, coba lagi</div>',
            );

            $this->session->set_flashdata($message);
            redirect('import');
        }
    }
}
