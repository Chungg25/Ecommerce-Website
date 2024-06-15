<?php
require_once "./mvc/models/orderModel.php";
require_once "./mvc/PhpXlsxGenerator.php";
require_once "./mvc/fpdf.php";
class order extends controller{
    protected $data; 

    function __construct(){
        $this->data = new orderModel();
    }
    static public function order(){
        $instance = new self();
        $view = $instance->viewFul();
        $data = [];
        while ($row = mysqli_fetch_assoc($view)) {
            $data[] = $row;
        }
        self::view('pages/order/order',$data);
    }

    static public function detail($id){
        $instance = new self();
        $view = $instance->viewDe($id);
        $data = mysqli_fetch_array($view);
        self::view('pages/order/detail', $data);
    }

    public function viewFul(){
        return $this->data->view();
    }

    public function viewDe($id){
        return $this->data->viewDe($id);
    }

    static public function update($id){
        $instance = new self();
        $instance->update_id($id);
    }

    public function update_id($id) {
        $this->data->update($id);
    }

    static public function update_status($id, $status){
        $instance = new self();
        $instance->updateStatus($id, $status);
    }

    public function updateStatus($id, $status) {
        $this->data->update_status($id, $status);
    }

    static public function excel($id){
        $fileName = "order" . date('Y-m-d') . ".xlsx"; 
        $excelData[] = array('ID', 'STATUS', 'NAME', 'EMAIL', 'ADDRESS', 'PHONE', 'PAYMENT', 'SHIPPING', 'CREATED', 'PRODUCT_NAME', 'PRODUCT_SIZE', 'PRODUCT_COLOR', 'PRICE', 'QUANTITY'); 
    
        $instance = new self();
        $query = $instance->viewDe($id);
        if($query->num_rows > 0){ 
            while($row = $query->fetch_assoc()){ 
    
                $shipping = ($row['shipping'] == 0)?'Thường':'Hỏa tốc'; 
                $price = $row['price'] - ($row['price'] * $row['discount']);
                $lineData = array($id, $row['status'], $row['username'], $row['email'], $row['address'], $row['phone'], $row['payment'], $shipping, $row['created_at'], $row['name'], $row['size_name'], $row['color_name'], $price, $row['quantity']); 
                $excelData[] = $lineData; 
            } 
        }
    
        $xlsx = CodexWorld\PhpXlsxGenerator::fromArray( $excelData ); 
        $xlsx->downloadAs($fileName); 
        detail($id);
    }

    static public function pdf($id){
        ob_end_clean(); 
        $pdf = new FPDF(); 
        // Add a new page 
        $pdf->AddPage(); 
        
        // Set the font for the text 
        $pdf->SetFont('Arial', 'B', 18); 

        // Set the font for the text 
        $pdf->SetFont('Arial', 'B', 14); 

        $instance = new self();
        $query = $instance->viewDe($id);
        if($query->num_rows > 0){ 
            $maxWidthKey = 0;
            $maxWidthValue = 0;
            while($row = $query->fetch_assoc()){ 
                $shipping = ($row['shipping'] == 0)?'Thuong':'Hoa toc'; 
                $price = $row['price'] - ($row['price'] * $row['discount']);
                $lineData = array(
                    'ID' => $id,
                    'Status' => $row['status'],
                    'Username' => $row['username'],
                    'Email' => $row['email'],
                    'Address' => $row['address'],
                    'Phone' => $row['phone'],
                    'Payment' => $row['payment'],
                    'Shipping' => $shipping,
                    'Created At' => $row['created_at'],
                    'Name' => $row['name'],
                    'Size Name' => $row['size_name'],
                    'Color Name' => $row['color_name'],
                    'Price' => $price,
                    'Quantity' => $row['quantity']
                );

                // Insert data into the PDF
                foreach ($lineData as $key => $value) {
                    $widthKey = $pdf->GetStringWidth($key) + 2;
                    $widthValue = $pdf->GetStringWidth($value) + 2;
                    if ($widthKey > $maxWidthKey) {
                        $maxWidthKey = $widthKey;
                    }
                    if ($widthValue > $maxWidthValue) {
                        $maxWidthValue = $widthValue;
                    }
                }
            } 

            $query = $instance->viewDe($id); // Get the data again
            while($row = $query->fetch_assoc()){ 
                $shipping = ($row['shipping'] == 0)?'Thuong':'Hoa toc'; 
                $price = $row['price'] - ($row['price'] * $row['discount']);
                $lineData = array(
                    'ID' => $id,
                    'Status' => $row['status'],
                    'Username' => $row['username'],
                    'Email' => $row['email'],
                    'Address' => $row['address'],
                    'Phone' => $row['phone'],
                    'Payment' => $row['payment'],
                    'Shipping' => $shipping,
                    'Created At' => $row['created_at'],
                    'Name' => $row['name'],
                    'Size Name' => $row['size_name'],
                    'Color Name' => $row['color_name'],
                    'Price' => $price,
                    'Quantity' => $row['quantity']
                );
        
                foreach ($lineData as $key => $value) {
                    $pdf->Cell($maxWidthKey, 10, $key, 1);
                    $pdf->Cell($maxWidthValue, 10, $value, 1);
                    $pdf->Ln(); // Go to the next line
                }
            } 
        }
        
        // Output the PDF
        $pdf->Output();
    }

}