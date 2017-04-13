<?php
	class InsertData extends DbConn {
		public function putData ($invoiceID, $datetv, $address1, $consignor, $consignee, $address2, $lease_freight_charges,
		$transport_charges, $handing_charges, $service_charges, $octroi_charges, $wharfage_charges, $bond_delivery_charges, 
		$courier_receipt, $other_expenses, $rr_no, $s_from, $s_to, $t_from, $t_to, $tot_words, $total) {
			try {
				$db = new DbConn;
				$tbl_invoices = $db->tbl_invoices;
				$stmt = $db->conn->prepare("INSERT INTO ".$tbl_invoices." (invoiceID, datetv, address1, consignor, consignee, address2, lease_freight_charges, 
										transport_charges, handing_charges, service_charges, octroi_charges, wharfage_charges, bond_delivery_charges, 
										courier_receipt, other_expenses, rr_no, s_from, s_to, t_from, t_to, tot_words, total) 
										VALUES (:invoiceID, :datetv, :address1, :consignor, :consignee, :address2, :lease_freight_charges, 
										:transport_charges, :handing_charges, :service_charges, :octroi_charges, :wharfage_charges,
										:bond_delivery_charges, :courier_receipt, :other_expenses, :rr_no, :s_from, :s_to, :t_from,
										:t_to, :tot_words, :total)");
										
				//$stmt = $db->conn->prepare("INSERT INTO ".$tbl_invoices." (invoiceID, datetv, address1, consignor, consignee, address2, lease_freight_charges)VALUES (:invoiceID, :datetv)");//, :datetv)");
				$time = strtotime($datetv);
				$newformat = date('Y-m-d',$time);
				
				$stmt->bindParam(':datetv', $datetv);
				$stmt->bindParam(':invoiceID', $invoiceID);
				$stmt->bindParam(':address1', $address1);
				$stmt->bindParam(':consignor', $consignor);
				$stmt->bindParam(':consignee', $consignee);
				$stmt->bindParam(':address2', $address2);
				$stmt->bindParam(':lease_freight_charges', $lease_freight_charges);
				$stmt->bindParam(':transport_charges', $transport_charges);
				$stmt->bindParam(':handing_charges', $handing_charges);
				$stmt->bindParam(':service_charges', $service_charges);
				$stmt->bindParam(':octroi_charges', $octroi_charges);
				$stmt->bindParam(':wharfage_charges', $wharfage_charges);
				$stmt->bindParam(':bond_delivery_charges', $bond_delivery_charges);
				$stmt->bindParam(':courier_receipt', $courier_receipt);
				$stmt->bindParam(':other_expenses', $other_expenses);
				$stmt->bindParam(':rr_no', $rr_no);
				$stmt->bindParam(':s_from', $s_from);
				$stmt->bindParam(':s_to', $s_to);
				$stmt->bindParam(':t_from', $t_from);
				$stmt->bindParam(':t_to', $t_to);
				$stmt->bindParam(':tot_words', $tot_words);
				$stmt->bindParam(':total', $total);
				$stmt->execute();
				$err = '';
			} catch (PDOException $e) {

            $err = "Error: " . $e->getMessage();

        }
        //Determines returned value ('true' or error code)
        if ($err == '') {

            $success = 'true';

        } else {

            $success = $err;

        };

        return $success;
			
		}
	}
?>