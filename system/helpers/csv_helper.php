<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('array_to_csv'))
{
    function array_to_csv($array, $download = "")
    {
        if ($download != "")
        {    
            header('Content-Type: application/csv');
            header('Content-Disposition: attachement; filename="' . $download . '"');
        }        

        ob_start();
        $f = fopen($download, 'wb') or show_error("Can't open php://output");
        $n = 0;        
        foreach ($array as $line)
        {
            $n++;
            if ( ! fputcsv($f, $line))
            {
                show_error("Can't write line $n: $line");
            }
        }
        fclose($f) or show_error("Can't close php://output");
        $str = ob_get_contents();
        ob_end_clean();

        if ($download == "")
        {
            return $str;    
        }
        else
        {    
            echo $str;
        }        
    }
}

if ( ! function_exists('query_to_csv'))
{
    function query_to_csv($query, $headers = TRUE, $download = "")
    {
        if ( ! is_object($query) OR ! method_exists($query, 'list_fields'))
        {
            show_error('invalid query');
        }
        
        $array = array();
        
        if ($headers)
        {
            $line = array();
            foreach ($query->list_fields() as $name)
            {
                $line[] = $name;
            }
            $array[] = $line;
        }
        
        foreach ($query->result_array() as $row)
        {
            $line = array();
            foreach ($row as $item)
            {
                $line[] = $item;
            }
            $array[] = $line;
        }

        echo array_to_csv($array, $download);
    }
}
//
//if (!function_exists('convert_to_csv')) {
//
//    function convert_to_csv($input_array, $output_file_name, $delimiter) {
//        /** open raw memory as file, no need for temp files */
//        $temp_memory = fopen('php://memory', 'w');
//        /** loop through array */
//        foreach ($input_array as $line) {
//            /** default php csv handler * */
//            fputcsv($temp_memory, $line, $delimiter);
//        }
//        /** rewrind the "file" with the csv lines * */
//        fseek($temp_memory, 0);
//        /** modify header to be downloadable csv file * */
//        header('Content-Type: application/csv');
//        header('Content-Disposition: attachement; filename="' . $output_file_name . '";');
//        /** Send file to browser for download */
//        fpassthru($temp_memory);
//    }
//
//}
/* End of file csv_helper.php */
/* Location: ./system/helpers/csv_helper.php */