<?php
class view extends ACore {
    public function get_content(){


        echo '<div id="main">';
        if(!$_GET['id_text']){
            echo 'Неправильные данные для вывода статьи';
        }
        else{
            $id_text = (int)$_GET['id_text'];
            if(!$id_text){
                echo 'Неправильные данные для вывода статьи';
            }
            else{
                $query = "SELECT title, text, date, id, img_src FROM statti WHERE id='$id_text'";
                $result = mysqli_query($this->db,$query);
                if(!$result){
                    exit(mysqli_connect_error());
                }
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                printf("<p style='font-size:18px;'>%s</p>
                        <p>%s</p>
                        <p><img width=150px align=left style='margin-right:5px;' src='%s'>%s</p>
                        ", $row['title'],$row['date'],$row['img_src'],$row['text']);
            }
        }
        echo '</div>
        </div>';
    }
}
?>