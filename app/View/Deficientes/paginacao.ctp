<?php 
            $array_json = array();
                // $pg_json = array();
                // $retorna = array();
                foreach($deficientes as $result){
                    $array['nome'] = $result['Deficiente']['nome'];
                    $array['id'] = $result['Deficiente']['id'];
                    $array['cpf'] = $result['Deficiente']['cpf'];
                    $array['deficiencia'] = $result['Deficiente']['deficiencia'];

                array_push($array_json, $array);   
                }
             /* $pg['PGtotal'] = $this->Paginator->counter('{:pages}');
                $pg['PGatual'] = $this->Paginator->counter('{:page}');
                
                array_push($pg_json, $pg);   
                
                $ret['pg'] = $pg_json;
                $ret['defi'] = $array_json;
                
                array_push($retorna, $ret); 
                echo json_encode($retorna);
              */
                echo json_encode($array_json);
            

?>