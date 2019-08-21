<?php
/*
 * Security model.
 *
 * Please do not make any change here.
 *
 */

class Sec extends CI_Model
{

    public function __construct(){
        parent::__construct();
		$this->partnerDB = $this->load->database('partnerdashboard', TRUE);
    }

    public function ck()
    {

        if ($this->db->query("SELECT COUNT(task_id) AS count FROM tasks")->row()->count > 9) {

            $p = base64_decode($this->db->query("SELECT conf_session_data FROM configs")->row()->conf_session_data);
            $pd = json_decode($p, true);
            if (!$pd['cd'] || strlen($pd['cd']) < 10) {
                return false;
            } else {
                return true;
            }
        } else {
            return true;
        }
    }

    public function prc_code($code)
    {

        $domain = $_SERVER['HTTP_HOST'];
        $data = $this->file_get_contents_curl("https://api.envato.com/v3/market/author/sale?code=" . $code);

        $res = json_decode($data, true);

        if (isset($res['error']) && $res['error']) {
            return false;

        } else {

            if (stripos($res['item']['name'], 'pKanban') !== false) {
                $save_data = base64_encode(json_encode(array("tm" => time(), "cd" => $code, "dm" => $domain)));
                $this->db->update('configs', array('conf_session_data' => $save_data));
                return true;
            } else {
                return false;
            }
        }

    }

    public function file_get_contents_curl($url)
    {
        if (extension_loaded('curl') === true) {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/29.0.1547.2 Safari/537.36");
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer 9YEsLktmMwGlPu0t1vtu7H93URgJjUhs'));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            $data = curl_exec($ch);
            curl_close($ch);
        } else {
            $data = file_get_contents($url);
        }
        return $data;
    }

    public function get_task_content($task_id){
        $this->assignColorToFirms();
        $TD = $this->db->where("task_id", $task_id)->get("tasks");
        $task_detail = "";
        $user_detail = "";
        $dashboard_user_app_form = "";
        $dashboard_user_detail = "";
        $dashboard_firm_detail = "";
        if($TD->num_rows()>0)
            $task_detail = $TD->row();
        
        $UD = $this->db->where("user_id", $task_detail->task_user)->get("users");
        if($UD->num_rows()>0)
            $user_detail = $UD->row();

        $DUAF = $this->partnerDB->where("task_id", $task_id)->get("user_fastfund_form1");
        if($DUAF->num_rows()>0)
            $dashboard_user_app_form = $DUAF->row();
        
        $DUD = $this->partnerDB->where("user_id", $dashboard_user_app_form->user_id)->get("user");
        if($DUD->num_rows()>0)
            $dashboard_user_detail = $DUD->row();
        
        if($dashboard_user_detail->dbe_firm_id!=0){
            $DFD = $this->partnerDB->query("SELECT * FROM dbe WHERE `Firm ID` = ".$dashboard_user_detail->dbe_firm_id."");
                if($DFD->num_rows()>0)
                    $dashboard_firm_detail = (array)$DFD->row();
        }
        $data['task'] = $task_detail;
        $data['user'] = $user_detail;
        $data['dashboard_user'] = $dashboard_user_detail;
        $data['dashboard_firm'] = $dashboard_firm_detail;

        if($dashboard_user_detail->dbe_firm_id!=0){
            $BNArray = explode(" ", $dashboard_firm_detail['Firm/DBA Name']);
        }else{
            $BNArray = array(''.$dashboard_user_detail->user_fname.'', ''.$dashboard_user_detail->user_lname.'');
        }
        
        if(!empty($BNArray)){
            $BNShortForm = '';
            foreach($BNArray as $BNKEY=>$BNVAL):
            $BNShortForm .= substr($BNVAL,0,1);
            endforeach;
        }
        
        $data['logo'] = $BNShortForm;
        if(!empty($dashboard_firm_detail['Logo'])){
            $data['logo'] = '<img style="width: 50px;border-radius: 25px" src="'.base_url().'uploads/'.$dashboard_firm_detail['Logo'].'">';
        }

        return $data;
    }

    public function assignColorToFirms(){
        $firms = $this->partnerDB->where("Firm_Color", "")->get("dbe")->result();
        //$firms = $this->partnerDB->get("dbe")->result();
        foreach($firms as $firm):
            if($firm->Firm_Color==""):
                $firm = (array)$firm;
                $this->partnerDB->query('UPDATE dbe SET `Firm_Color` = "'.$this->random_color().'" WHERE `Firm ID` = '.$firm['Firm ID'].'');
            endif;
        endforeach;
    }
    
    public function random_color(){
        return str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT) . str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT) . str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT);
    }

    public function check_form_exists($task_id){
        $result = $this->partnerDB->where("task_id", $task_id)->get("user_fastfund_form1");
        return $result->num_rows();
    }

}