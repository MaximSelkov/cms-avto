<?php
class menu extends ACore {
    public function get_content(){
        echo '<div id="main">';

        if(!$_GET['id_menu']){
            echo 'Неправильные данные для вывода меню';
        }
        else{
            $id_menu = (int)$_GET['id_menu'];
            if(!$id_menu){
                echo 'Неправильные данные для вывода меню';
            }
            else{
                $query = "SELECT id_menu, name_menu, text_menu FROM menu WHERE id_menu='$id_menu'";
                $result = mysqli_query($this->db,$query);
                if(!$result){
                    exit(mysqli_connect_error());
                }
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                printf("<p style='font-size:18px;'>%s</p>
                        <p>%s</p>
                        ", $row['name_menu'],$row['text_menu']);
            }
        }
        echo '</div>
        </div>';
    }
}
?>