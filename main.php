 function get_week_list($year) {
        $week_list = [];
        $i = '01';
        $next_year_btime = strtotime(($year + 1) . '-01-01');
        
        while(($btime = strtotime("{$year}W{$i}"))) {
            if ($btime >= $next_year_btime) {
                break;
            }
   
            $i = (int)$i;
            $etime = strtotime("+7 day", $btime) - 1;

            $btime = date('Y-m-d H:i:s', $btime);
            $etime = date('Y-m-d H:i:s', $etime);
            $week_list[$i] = [$btime, $etime];
            
            $i++;
            if($i < 10) {
                $i = '0' . $i;
            }
        }
        return $week_list;
    }
