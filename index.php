<?php
header('Access-Control-Allow-Origin: *');
define('ACCESLOGO', 'images/USNY.png');

//require_once(dirname(__FILE__) . '\fpdf\fpdf.php');

require_once('Fpdf.php');
require_once('utilities.php');

generateform();


function generateform() {
	
	$data = new stdClass();
	
	//=	=================Set data for old forms=============
	
	if ($_POST['1-AV#*']) {
		
		$data->av_num = $_POST['1-AV#*'];
		
	}
	
	
	if ($_POST['2-ACCES-VR_ID#*']) {
		
		$data->acces_id = $_POST['2-ACCES-VR_ID#*'];
		
	}
	
	
	if ($_POST['3-CAMS_ID#*']) {
		
		$data->cams_id = $_POST['3-CAMS_ID#*'];
		
	}
	
	
	if ($_POST['4-VR_District_Office*']) {
		
		$data->dist_office = $_POST['4-VR_District_Office*'];
		
	}
	
	
	if ($_POST['5-VRC_Name']) {
		
		$data->vr_counselor = $_POST['5-VRC_Name'];
		
	}
	
	
	if ($_POST['5-VRC_Name*']) {
		
		$data->vr_counselor = $_POST['5-VRC_Name*'];
		
	}
	
	
	if ($_POST['6-Provider*']) {
		
		$data->provider = $_POST['6-Provider*'];
		
	}
	
	
	if ($_POST['9-Student_First_Name']) {
		
		$data->stu_fname = $_POST['9-Student_First_Name'];
		
	}
	
	
	if ($_POST['9-Student_First_Name*']) {
		
		$data->stu_fname = $_POST['9-Student_First_Name*'];
		
	}
	
	
	if ($_POST['10-Student_Last_Name']) {
		
		$data->stu_lname = $_POST['10-Student_Last_Name'];
		
	}
	
	
	if ($_POST['10-Student_Last_Name*']) {
		
		$data->stu_lname = $_POST['10-Student_Last_Name*'];
		
	}
	
	
	foreach( $_POST as $key => $postItem ) {
		
		if ($postItem === 'Yes') {
			$_POST[$key] = true;
		}
		
		if ($postItem === 'Off') {

			$_POST[$key] = false;
			
		}
		
	}
	
	//===================================================
	if ($_POST['formtype']) {
		switch ($_POST['formtype']) {
			case 'SERVICENOTE':
				renderForm_SERVICENOTE();
				break;
			case 'MTR':
				renderForm_MTR();
				break;
			case '127X':
				renderForm_127X($data);
				break;
			case '125X126X':
				renderForm_125X126X($data);
				break;
			case '122X':
				renderForm_122X($data);
				break;
			case '121X':
				renderForm_121X($data);
				break;
			case '959X563X':
				renderForm_959X563X($data);
				break;
			case '110X':
				renderForm_110X($data);
				break;
			case '123X':
				renderForm_123X($data);
				break;
			case '557X':
				renderForm_557X($data);
				break;
			case '559X':
				renderForm_559X($data);
				break;
			case '124X':
				renderForm_124X($data);
				break;
			case 'AVMPAR':
				renderForm_AVMPAR($data);
				break;
			case '929X935X':
				renderForm_929X935X($data);
				break;
			case '932X937X':
				renderForm_932X937X($data);
				break;
			case '921X':
				renderForm_921X($data);
				break;
			case 'MONTHLYPLANNERCALENDAR':
				renderForm_MONTHLYPLANNERCALENDAR($data);
				break;
		}
	} else {
		echo '[CEO Form Processor Server Running]';	
	}
	
}


function renderForm_SERVICENOTE() {
	
	$pdf = new FPDF('P', 'in', 'Letter');
	
	$pdf->SetCreator('CEO, Inc.');
	
	$pdf->SetAuthor('CEO, Inc.');
	
	$pdf->SetTitle('Report');
	
	//=	=========================
	
	$pdf->AddPage('P','Letter');
	
	$pdf->SetMargins(0.5,0.5,0.5);
	
	
	$pdf->SetFont('Times','',12);
	
	$pdf->Cell(0,0.2,'Career and Employment Options, Inc.',0,0,'C');
	
	$pdf->Ln();
	
	$pdf->Cell(0,0.2,'1 Rabro Drive, Suite 102',0,0,'C');
	
	$pdf->Ln();
	
	$pdf->Cell(0,0.2,'Hauppauge, N.Y. 11788',0,0,'C');
	
	$pdf->Ln();
	
	$pdf->Cell(0,0.2,'Phone (631) 234-6064 Fax (631) 234-6081',0,0,'C');
	
	$pdf->Ln();
	
	$pdf->Ln();
	
	$pdf->SetFont('Times','B',12);
	
	$pdf->Cell(0,0.2,'Service Notes/Meeting Minutes',0,0,'C');
	
	$pdf->Ln();
	
	// 	$pdf->Ln();
	
	$pdf->Ln();
	
	
	$pdf->Cell(0,0.2,'','LTR',0,'L', false);
	
	$pdf->Ln();
	
	
	$pdf->Cell(0.25,0.2,'','L',0,'L', false);
	
	$pdf->Cell(1,0.2,'Date:','',0,'L', false);
	
	$pdf->SetFont('Times','',12);
	
	$pdf->Cell(0,0.2,$_POST['1-Date*'],'R',0,'L', false);
	
	$pdf->Ln();
	
	
	$pdf->SetFont('Times','B',12);
	
	$pdf->Cell(0.25,0.2,'','L',0,'L', false);
	
	$pdf->Cell(1,0.2,'Locations:',0,0,'L', false);
	
	$pdf->SetFont('Times','',12);
	
	$pdf->Cell(0,0.2,$_POST['2-Locations*'],'R', 0, 'L', false);
	
	$pdf->Ln();
	
	
	$pdf->SetFont('Times','B',12);
	
	$pdf->Cell(0.25,0.2,'','L',0,'L', false);
	
	$pdf->Cell(1,0.2,'Student:',0,0,'L', false);
	
	$pdf->SetFont('Times','',12);
	
	$pdf->Cell(0,0.2,$_POST['3-Student*'], 'R', 0, 'L', false);
	
	$pdf->Ln();
	
	
	$pdf->SetFont('Times','B',12);
	
	$pdf->Cell(0.25,0.2,'','L',0,'L', false);
	
	$pdf->Cell(7.25,0.2,'Attendees:','R',1,'L');
	
	$pdf->SetFont('Times','',12);

	$pdf->Cell(0.25,1.2,'','L',0,'L', false);
	$pdf->MultiCell(7.25,0.2,$_POST['4-Attendees'],'R','J',0);


	$pdf->Cell(0,0.2,'','LR',1,'L', false);
	
	
	$pdf->SetFont('Times','B',12);
	
	$pdf->Cell(0.25,0.2,'','L',0,'L', false);
	
	$pdf->Cell(1,0.2,'Time:',0,0,'L', false);
	
	$pdf->SetFont('Times','',12);
	
	$pdf->Cell(0,0.2,$_POST['5-Time*'], 'R', 0, 'L', false);
	
	$pdf->Ln();
	
	
	$pdf->SetFont('Times','B',12);
	
	$pdf->Cell(0.25,0.2,'','L',0,'L', false);
	
	$pdf->Cell(1,0.2,'Activity:',0,0,'L', false);
	
	$pdf->SetFont('Times','',12);
	
	$pdf->Cell(0,0.2,$_POST['6-Activity*'], 'R', 0, 'L', false);
	
	$pdf->Ln();
	
	
	$pdf->SetFont('Times','B',12);
	
	$pdf->Cell(0.25,0.2,'','L',0,'L', false);
	
	$pdf->Cell(1,0.2,'Unit:','',0,'L', false);
	
	$pdf->SetFont('Times','',12);
	
	$pdf->Cell(1,0.2,$_POST['7-Unit'], '', 0, 'L', false);
	
	
	$pdf->SetFont('Times','B',12);
	
	$pdf->Cell(1,0.2,'Lesson:','',0,'L', false);
	
	$pdf->SetFont('Times','',12);
	
	$pdf->Cell(0,0.2,$_POST['8-Lesson'], 'R', 0, 'L', false);
	
	$pdf->Ln();
	
	
	$pdf->Cell(0,0.2,'','LBR',0,'L', false);
	
	$pdf->Ln();
	
	
	
	$pdf->Ln();
	
	$pdf->Ln();
	
	$pdf->SetFont('Times','B',12);
	
	$pdf->Cell(0,0.2,'Purpose: ');
	
	$pdf->SetFont('Times','',10);
	
	$pdf->Ln();
	
	$pdf->Write(0.2, $_POST['9-Purpose*']);
	
	$pdf->Ln();
	
	$pdf->Ln();
	
	$pdf->Ln();
	
	$pdf->SetFont('Times','B',12);
	
	$pdf->Cell(0,0.2,'Actions: ');
	
	$pdf->SetFont('Times','',10);
	
	$pdf->Ln();
	
	$pdf->Write(0.2, $_POST['10-Actions*']);
	
	
	
	$pdf->Ln();
	
	$pdf->Ln();
	
	$pdf->Cell(4,0.2,$_POST['11-CEO_Staff_Name_and_Title*'],0,0,false);
	
	$pdf->Cell(4,0.2,$_POST['12-Signature_Date*'],0,0,false);
	
	$pdf->Ln();
	
	$pdf->Cell(4,0.2,'CEO Staff Name and Title',0,0,false);
	
	$pdf->Cell(4,0.2,'Date',0,0,false);
	
	
	$pdf->Line( 0.4, $pdf->GetY(), 3.0, $pdf->GetY());
	
	$pdf->Line( 4.4, $pdf->GetY(), 7.0, $pdf->GetY());
	
	
	$pdf->Ln();
	
	$pdf->Cell(0,0.2,'Career and Employment Options, Inc.',0,0, false);
	
	$pdf->Ln();
	
	
	$pdf->SetX(6.5);
	
	$pdf->SetY(10.0);
	
	$pdf->SetFont('Times','', 6);
	
	//=	=========================
	$pdf->Output('report.pdf', 'I');
	
}


function renderForm_122X($data) {
	
	$pdf = new FPDF('P', 'in', 'Letter');
	
	$pdf->SetCreator('CEO, Inc.');
	
	$pdf->SetAuthor('CEO, Inc.');
	
	$pdf->SetTitle('Report');
	
	//=	=========================
	$pdf->AddPage('P','Letter');
	
	
	$pdf->SetFillColor(200,200,200);
	
	
	$pdf->SetMargins(0.75,0.25,0.75);
	
	
	$filename = $data->av_num . ' 122X ' . strtoupper(date('M',$service_date)) .' '. date('y',$service_date);
	
	
	$pdf->filename = $filename;
	
	
	
	$pdf->SetTitle($filename);
	
	
	$pdf->SetCreator('CEO Transmetrics');
	
	
	$pdf->SetAuthor($condata->con_fname . ' ' . $condata->con_lname);
	
	
	$pdf->Image(ACCESLOGO,3.75,0.25,1.0,1.0);
	
	$pdf->Ln(0.85);
	
	
	$pdf->SetFont('Arial','B',10);
	
	$pdf->Cell(7.0,0.2,'VR-122X',0,0,'C');
	
	$pdf->Ln(0.3);
	
	
	$pdf->SetFont('Arial', 'B', 14);
	
	$pdf->Cell(7.0,0.2,'Pre-Employment Transition Services (Pre-ETS)',0,0,'C');
	
	$pdf->Ln(0.3);
	
	$pdf->SetFont('Arial','B',12);
	
	$pdf->Cell(7.0,0.2,'122X - Job Exploration Counseling',0,1,'C');
	
	$pdf->Ln(0.3);
	
	
	// 	The section below COMMON-1 is on all documents
	
	$pdf->SetFont('Arial', '', 10);
	
	$pdf->Cell(1.75,0.2,'','',0,'L');
	
	$pdf->Cell(1.25,0.2,'AV#:', 'LTB', 0, 'L');
	
	$pdf->Cell(0.75,0.2,'(7 digits)','TB', 0, 'L');
	
	$pdf->Cell(1.50,0.2,$data->av_num,'TBR', 1, 'L');
	
	
	$pdf->Cell(1.75,0.2,'','',0,'L');
	
	$pdf->Cell(1.25,0.2,'ACCES-VR ID#:','LTB',0, 'L');
	
	$pdf->Cell(0.75,0.2,'(6 digits)','TB', 0, 'L');
	
	$pdf->Cell(1.50,0.2,$data->acces_id,'TBR', 1, 'L');
	
	
	$pdf->Cell(1.75,0.2,'','',0,'L');
	
	$pdf->Cell(1.25,0.2,'CAMS ID #:', 'LTB', 0, 'L');
	
	$pdf->Cell(0.75,0.2,'(10 digits)', 'TB', 0,'L');
	
	$pdf->Cell(1.50,0.2,$data->cams_id, 'TBR', 1,'L');
	
	
	$pdf->Ln();
	
	
	$pdf->SetFont('Arial','',10);
	
	$pdf->Cell(1.2,0.2,'VR District Office:','LT',0,'L');
	
	$pdf->Cell(2.3,0.2,$data->dist_office,'TR',0,'L');
	
	
	$pdf->Cell(1.0,0.2,'Provider:','LT',0,'L');
	
	$pdf->Cell(2.5,0.2,$data->provider,'TR',0,'L');
	
	$pdf->Ln();
	
	
	$pdf->Cell(1.2,0.2,'VRC Name:','LT',0,'L');
	
	$pdf->Cell(2.3,0.2,$data->vr_counselor,'TR',0,'L');
	
	
	$pdf->Cell(1.5,0.2,'NYS Fiscal System ID:','LTB',0,'L');
	
	$pdf->Cell(2.0,0.2,'1000018463','TRB',0,'L');
	
	$pdf->Ln();
	
	
	$pdf->Cell(3.5,0.2,'','LTBR',0,'L');
	
	$pdf->Cell(1.0,0.2,'Report Date:','LB',0,'L');
	
	$pdf->Cell(2.5,0.2,$_POST['8-Report_Date*'],'BR',0,'L');
	
	$pdf->Ln();
	
	
	// 	End of COMMON-1 Area
	// 	Start of COMMON-2a Area  slight variations between forms
	
	$pdf->Ln();
	
	
	$pdf->Cell(1.5,0.2,'Student First Name:','LTB',0,'L');
	
	$pdf->Cell(2.0,0.2,$_POST['9-Student_First_Name*'],'TBR',0,'L');
	
	$pdf->Cell(1.5,0.2,'Student Last Name:','LTB',0,'L');
	
	$pdf->Cell(2.0,0.2,$_POST['10-Student_Last_Name*'],'TBR',0,'L');
	
	$pdf->Ln();
	
	
	$pdf->Cell(1.5,0.2,'Student Phone Number: ','LTB',0,'L');
	
	$pdf->Cell(2.0,0.2,$_POST['11-Student_Phone_Number'],'TBR',0,'L');
	
	$pdf->Cell(1.5,0.2,'Student Age:','LTB',0,'L');
	
	$pdf->Cell(2.0,0.2,$_POST['12-Student_Age'],'TBR',0,'L');
	
	$pdf->Ln();
	
	
	$pdf->Cell(2.0,0.2,'Student Email Address: ','LTB',0,'L');
	
	$pdf->Cell(5.0,0.2,$_POST['13-Student_Email_Address'],'TBR',1,'L');
	
	$pdf->Ln();
	
	
	// 	End of COMMON-2a Area
	
	// 	Start of CONTENT Area
	
	$pdf->Ln();
	
	$pdf->SetFont('Arial','B',12);
	
	$pdf->Cell(3.0,0.2,'Service Delivery Format:',0,0,'L');
	
	$pdf->SetFont('Arial','',12);
	
	$pdf->Cell(0.15,0.15,($_POST['16-Service_Delivery_Format:_Individual_Service']) ? 'X' : ' ',1,0,'C');
	
	$pdf->Cell(0.30,0.2,'',0,0,'L');
	
	$pdf->Cell(1.50,0.2,'Individual Service',0,0,'L');
	
	
	$pdf->Cell(0.15,0.15,($_POST['17-Service_Delivery_Format:_Group_Service']) ? 'X' : ' ',1,0,'C');
	
	$pdf->Cell(0.30,0.2,'',0,0,'L');
	
	$pdf->Cell(1.50,0.2,'Group Service',0,1,'L');
	
	
	$pdf->Ln();
	
	
	$pdf->SetFont('Arial','B',12);
	
	$pdf->Cell(7.0,0.2,'Areas addressed based upon student needs:',0,0,'L');
	
	$pdf->SetFont('Arial','',12);
	
	
	$pdf->Ln();
	
	$pdf->Cell(0.10,0.2,'',0,0,'L');
	
	$pdf->Cell(0.15,0.15,($_POST['18-Areas_addressed_based_upon_student_needs:_Vocational_Interest_Inventory_Results']) ? 'X' : ' ',1,0,'C');
	
	$pdf->Cell(0.20,0.2,'',0,0,'L');
	
	$pdf->Cell(6.50,0.2,'Vocational Interest Inventory Results',0,0,'L');
	
	
	$pdf->Ln();
	
	$pdf->Cell(0.10,0.2,'',0,0,'L');
	
	$pdf->Cell(0.15,0.15,($_POST['19-Areas_addressed_based_upon_student_needs:_Labor_Market']) ? 'X' : ' ',1,0,'C');
	
	$pdf->Cell(0.20,0.2,'',0,0,'L');
	
	$pdf->Cell(6.50,0.2,'Labor Market',0,0,'L');
	
	
	$pdf->Ln();
	
	$pdf->Cell(0.10,0.2,'',0,0,'L');
	
	$pdf->Cell(0.15,0.15,($_POST['20-Areas_addressed_based_upon_student_needs:_In-demand_Industries_and_Occupations']) ? 'X' : ' ',1,0,'C');
	
	$pdf->Cell(0.20,0.2,'',0,0,'L');
	
	$pdf->Cell(6.50,0.2,'In-demand Industries and Occupations',0,0,'L');
	
	
	$pdf->Ln();
	
	$pdf->Cell(0.10,0.2,'',0,0,'L');
	
	$pdf->Cell(0.15,0.15,($_POST['21-Areas_addressed_based_upon_student_needs:_Non-traditional_Employment_Options']) ? 'X' : ' ',1,0,'C');
	
	$pdf->Cell(0.20,0.2,'',0,0,'L');
	
	$pdf->Cell(6.50,0.2,'Non-traditional Employment Options',0,0,'L');
	
	
	$pdf->Ln();
	
	$pdf->Cell(0.10,0.2,'',0,0,'L');
	
	$pdf->Cell(0.15,0.15,($_POST['22-Areas_addressed_based_upon_student_needs:_Identification_of_Career_Pathways_of_Interest_to_the_Student(s)']) ? 'X' : ' ',1,0,'C');
	
	$pdf->Cell(0.20,0.2,'',0,0,'L');
	
	$pdf->Cell(6.50,0.2,'Identification of Career Pathways of Interest to the Student(s)',0,0,'L');
	
	
	$pdf->Ln();
	
	$pdf->Cell(0.10,0.2,'',0,0,'L');
	
	$pdf->Cell(0.15,0.15,($_POST['23-Areas_addressed_based_upon_student_needs:_Career_Awareness']) ? 'X' : ' ',1,0,'C');
	
	$pdf->Cell(0.20,0.2,'',0,0,'L');
	
	$pdf->Cell(6.50,0.2,'Career Awareness',0,0,'L');
	
	
	$pdf->Ln();
	
	$pdf->Cell(0.10,0.2,'',0,0,'L');
	
	$pdf->Cell(0.15,0.15,($_POST['24-Areas_addressed_based_upon_student_needs:_Career_Speakers']) ? 'X' : ' ',1,0,'C');
	
	$pdf->Cell(0.20,0.2,'',0,0,'L');
	
	$pdf->Cell(6.50,0.2,'Career Speakers',0,0,'L');
	
	
	$pdf->Ln();
	
	$pdf->Cell(0.10,0.2,'',0,0,'L');
	
	$pdf->Cell(0.15,0.15,($_POST['25-Areas_addressed_based_upon_student_needs:_Career_Student_Organization']) ? 'X' : ' ',1,0,'C');
	
	$pdf->Cell(0.20,0.2,'',0,0,'L');
	
	$pdf->Cell(6.50,0.2,'Career Student Organization',0,0,'L');
	
	
	$pdf->Ln();
	
	$pdf->Cell(0.10,0.2,'',0,0,'L');
	
	$pdf->Cell(0.15,0.15,($_POST['26-Areas_addressed_based_upon_student_needs:_Skills_Needed_in_the_Workforce_for_Specific_Jobs']) ? 'X' : ' ',1,0,'C');
	
	$pdf->Cell(0.20,0.2,'',0,0,'L');
	
	$pdf->Cell(6.50,0.2,'Skills Needed in the Workforce for Specific Jobs',0,0,'L');
	
	
	$pdf->Ln();
	
	$pdf->Cell(0.10,0.2,'',0,0,'L');
	
	$pdf->Cell(0.15,0.15,'',0,0,'L');
	
	$pdf->Cell(0.20,0.2,'',0,0,'L');
	
	$pdf->Cell(1.00,0.2,'(List Jobs:)',0,0,'L');
	
	$pdf->Cell(0.20,0.2,'',0,0,'L');
	
	$pdf->MultiCell(5.5,0.2,$_POST['27-List_Jobs'],0,'L',0);
	
	
	$pdf->SetFont('Arial','B',12);
	
	$pdf->Cell(1.0,0.2,'Other Areas:',0,0,'L');
	
	$pdf->SetFont('Arial','',12);
	
	$pdf->Cell(0.20,0.2,'',0,0,'L');
	
	$pdf->MultiCell(5.5,0.2,$_POST['28-Other_Areas'],0,'L',0);
	
	
	//$	pdf->Ln();
	
	//$	pdf->Cell(0.15,0.15,($data->indemand) ? 'X' : ' ',1,0,'C');
	
	//$	pdf->Cell(0.30,0.2,'',0,0,'L');
	
	//$	pdf->Cell(6.50,0.2,'In-demand Industries and Occupations',0,0,'L');
	
	
	$pdf->Ln();
	
	$pdf->SetFont('Arial','B',11);
	
	$pdf->MultiCell(6.0, 0.2, 'Please provide a narrative describing the students experience with Job Exploration Counseling services delivered:', 0, 'J', 0);
	
	$pdf->SetFont('Arial','',11);
	
	$pdf->MultiCell(6.0, 0.2, $_POST['29-Please_provide_a_narrative_describing_the_students_experience_with_the_Job_Exploration_Counseling_services_delivered*'], 0, 'J', 0);
	
	$pdf->Ln();
	
	
	$pdf->Ln();
	
	
	// 	Start of FOOTER-1 Area
	
	$pdf->SetFont('Arial','B',12);
	
	$pdf->Cell(1.0,0.2,'Completed By: ', 0, 1, 'L');
	
	$pdf->SetFont('Arial','',11);
	
	$pdf->Ln();
	
	
	$pdf->Cell(4.0,0.2,'', 'B', 0, 'L');
	$pdf->Cell(0.5,0.2,'', 0, 0, 'C');
	$pdf->Cell(2.5,0.2,$_POST['30-Signature_Date*'], 'B', 1, 'L');
	
	$pdf->Cell(4.0,0.2,'Signature of Evaluator', 0, 0, 'L');
	$pdf->Cell(0.5,0.2,'', 0, 0, 'C');
	$pdf->Cell(2.5,0.2,'Date', 0, 1, 'L');
	
	$pdf->Ln();
	
	
	$pdf->Cell(4.0,0.2,$_POST['31-Qualified_Evaluator_Printed_Name*'], 'B', 0, 'L');
	$pdf->Cell(0.5,0.2,'', 0, 0, 'C');
	$pdf->Cell(2.5,0.2,$_POST['32-Qualified_Evaluator_Title*'], 'B', 1, 'L');
	
	$pdf->Cell(4.0,0.2,'Printed Name', 0, 0, 'L');
	$pdf->Cell(0.5,0.2,'', 0, 0, 'C');
	$pdf->Cell(2.5,0.2,'Title', 0, 1, 'L');
	
	$pdf->Ln();
	
	$pdf->Cell(1.25,0.2,'Phone Number:', 0, 0, 'L');
	
	$pdf->Cell(2.75,0.2,$_POST['33-Phone_Number*'], 0, 0, 'L');
	
	$pdf->Cell(0.50,0.2,'', 0, 0, 'C');
	
	$pdf->Cell(0.50,0.2,'Email:', 0, 0, 'L');
	
	$pdf->Cell(2.00,0.2,$_POST['34-Email*'], 0, 1, 'L');
	
	$pdf->Ln();
	
	$pdf->Ln();
	
	
	$pdf->SetFont('Arial','B',12);
	
	$pdf->Cell(1.0,0.2,'Provider Supervisor: ', 0, 1, 'L');
	
	$pdf->SetFont('Arial','',11);
	
	$pdf->Ln();
	
	
	$pdf->Cell(4.0,0.2,'', 'B', 0, 'L');
	$pdf->Cell(0.5,0.2,'', 0, 0, 'C');
	$pdf->Cell(2.5,0.2,$_POST['35-Provider_Supervisor_Signature_Date'], 'B', 1, 'L');
	
	$pdf->Cell(4.0,0.2,'Signature of Evaluator II', 0, 0, 'L');
	$pdf->Cell(0.5,0.2,'', 0, 0, 'C');
	$pdf->Cell(2.5,0.2,'Date', 0, 1, 'L');
	
	$pdf->Ln();
	
	$pdf->Cell(4.0,0.2,$_POST['36-Provider_Supervisor_Printed_Name'], 'B', 0, 'L');
	$pdf->Cell(0.5,0.2,'', 0, 0, 'C');
	$pdf->Cell(2.5,0.2,$_POST['37-Provider_Supervisor_Title'], 'B', 1, 'L');
	
	$pdf->Cell(4.0,0.2,'Printed Name', 0, 0, 'L');
	$pdf->Cell(0.5,0.2,'', 0, 0, 'C');
	$pdf->Cell(2.5,0.2,'Title', 0, 1, 'L');
	
	$pdf->Ln();
	
	//=	=========================
	$pdf->Output('report.pdf', 'I');
	
}


function renderForm_121X($data) {
	
	$pdf = new FPDF('P', 'in', 'Letter');

	$pdf->SetCreator('CEO, Inc.');
	
	$pdf->SetAuthor('CEO, Inc.');
	
	$pdf->SetTitle('Report');
	
	//=	=========================
	$pdf->AddPage('P','Letter');
	
	
	$pdf->SetFillColor(200,200,200);
	
	
	$pdf->SetMargins(0.75,0.25,0.75);
	
	
	$pdf->Image(ACCESLOGO,3.75,0.25,1.0,1.0);
	
	$pdf->Ln(0.85);
	
	
	$pdf->SetFont('Arial','B',10);
	
	$pdf->Cell(7.0,0.2,'VR-121X',0,0,'C');
	
	$pdf->Ln(0.4);
	
	
	$pdf->SetFont('Arial', 'B', 14);
	
	$pdf->Cell(7.0,0.2,'Pre-Employment Transition Services (Pre-ETS)',0,0,'C');
	
	$pdf->Ln(0.3);
	
	$pdf->Cell(7.0,0.2,'121X - COUNSELING ON OPPORTUNITES FOR ENTOLLMENT IN',0,1,'C');
	
	$pdf->Cell(7.0,0.2,'TRANSITION OR POST-SECONDARY EDUCATIONAL PROGRAMS AT',0,1,'C');
	
	$pdf->Cell(7.0,0.2,'INSTITUTIONS OF HIGHER LEARNING',0,1,'C');
	
	$pdf->Ln();
	
	
	// 	The section below COMMON-1 is on all documents
	
	$pdf->SetFont('Arial', '', 10);
	
	$pdf->Cell(1.75,0.2,'','',0,'L');
	
	$pdf->Cell(1.25,0.2,'AV#:', 'LTB', 0, 'L');
	
	$pdf->Cell(0.75,0.2,'(7 digits)','TB', 0, 'L');
	
	$pdf->Cell(1.50,0.2,$data->av_num,'TBR', 1, 'L');
	
	
	$pdf->Cell(1.75,0.2,'','',0,'L');
	
	$pdf->Cell(1.25,0.2,'ACCES-VR ID#:','LTB',0, 'L');
	
	$pdf->Cell(0.75,0.2,'(6 digits)','TB', 0, 'L');
	
	$pdf->Cell(1.50,0.2,$data->acces_id,'TBR', 1, 'L');
	
	
	$pdf->Cell(1.75,0.2,'','',0,'L');
	
	$pdf->Cell(1.25,0.2,'CAMS ID #:', 'LTB', 0, 'L');
	
	$pdf->Cell(0.75,0.2,'(10 digits)', 'TB', 0,'L');
	
	$pdf->Cell(1.50,0.2,$data->cams_id, 'TBR', 1,'L');
	
	
	$pdf->Ln();
	
	
	$pdf->SetFont('Arial','',10);
	
	$pdf->Cell(1.2,0.2,'VR District Office:','LT',0,'L');
	
	$pdf->Cell(2.3,0.2,$data->dist_office,'TR',0,'L');
	
	
	$pdf->Cell(1.0,0.2,'Provider:','LT',0,'L');
	
	$pdf->Cell(2.5,0.2,$data->provider,'TR',0,'L');
	
	$pdf->Ln();
	
	
	$pdf->Cell(1.2,0.2,'VRC Name:','LT',0,'L');
	
	$pdf->Cell(2.3,0.2,$data->vr_counselor,'TR',0,'L');
	
	
	$pdf->Cell(1.5,0.2,'NYS Fiscal System ID:','LTB',0,'L');
	
	$pdf->Cell(2.0,0.2,'1000018463','TRB',0,'L');
	
	$pdf->Ln();
	
	
	$pdf->Cell(3.5,0.2,'','LTBR',0,'L');
	
	$pdf->Cell(1.0,0.2,'Report Date:','LB',0,'L');
	
	$pdf->Cell(2.5,0.2,$_POST['8-Report_Date*'],'BR',0,'L');
	
	$pdf->Ln();
	
	
	// 	End of COMMON-1 Area
	// 	Start of COMMON-2a Area  slight variations between forms
	
	$pdf->Ln();
	
	
	$pdf->Cell(1.5,0.2,'Student First Name:','LTB',0,'L');
	
	$pdf->Cell(2.0,0.2,$_POST['9-Student_First_Name*'],'TBR',0,'L');
	
	$pdf->Cell(1.5,0.2,'Student Last Name:','LTB',0,'L');
	
	$pdf->Cell(2.0,0.2,$_POST['10-Student_Last_Name*'],'TBR',0,'L');
	
	$pdf->Ln();
	
	
	$pdf->Cell(1.5,0.2,'Student Phone Number: ','LTB',0,'L');
	
	$pdf->Cell(2.0,0.2,$_POST['11-Student_Phone_Number'],'TBR',0,'L');
	
	$pdf->Cell(1.5,0.2,'Student Age:','LTB',0,'L');
	
	$pdf->Cell(2.0,0.2,$_POST['12-Student_Age'],'TBR',0,'L');
	
	$pdf->Ln();
	
	
	$pdf->Cell(2.0,0.2,'Student Email Address: ','LTB',0,'L');
	
	$pdf->Cell(5.0,0.2,$_POST['13-Student_Email_Address'],'TBR',1,'L');
	
	$pdf->Ln();
	
	
	// 	End of COMMON-2a Area
	
	// 	Start of CONTENT Area
	
	$pdf->Cell(7.0,0.2,'','LTR',1,'C');
	
	
	$pdf->SetFont('Arial','B',11);
	
	$pdf->Cell(2.5,0.2,'Service Delivery Format:','L',0,'L');
	
	$pdf->SetFont('Arial','',11);
	
	$pdf->Cell(0.15,0.15, $_POST['14-Service_Delivery_Format:_Individual_Service'] ? 'X' : ' ',1,0,'C');
	
	$pdf->Cell(0.2,0.2,'',0,0,'L');
	
	$pdf->Cell(1.5,0.2,'Individual Service',0,0,'L');
	
	$pdf->Cell(0.15,0.15, $_POST['15-Service_Delivery_Format:_Student_and_Family_Member'] ? 'X' : ' ',1,0,'C');
	
	$pdf->Cell(0.2,0.2,'',0,0,'L');
	
	$pdf->Cell(2.0,0.2,'Student and Family Member',0,0,'L');
	
	$pdf->Cell(0.3,0.2,'','R',1,'C');
	
	
	$pdf->Cell(7.0,0.2,'','LR',1,'C');
	
	
	$pdf->SetFont('Arial','B',11);
	
	$pdf->Cell(2.5,0.2,'Units of Service (Up to 10 Hours):','L',0,'L');
	
	$pdf->SetFont('Arial','',11);
	
	//$	pdf->Cell(0.4,0.2,'',0,0,'L');
	
	$pdf->Cell(0.75,0.2,$_POST['16-Units_of_Service*'],0,0,'R');
	
	$pdf->Cell(3.75,0.2,'','R',1,'C');
	
	
	$pdf->Cell(7.0,0.2,'','LR',1,'C');
	
	
	$pdf->SetFont('Arial','B',11);
	
	$pdf->Cell(1.5,0.2,'Service Dates:','L',0,'L');
	
	$pdf->SetFont('Arial','',11);
	
	//$	pdf->Cell(0.4,0.2,'',0,0,'L');
	
	$pdf->Cell(5.0,0.2,$_POST['17-Service_Dates*'],0,0,'L');
	
	$pdf->Cell(0.5,0.2,'','R',1,'C');
	
	
	$pdf->Cell(7.0,0.2,'','LR',1,'C');
	
	
	$pdf->SetFont('Arial','B',11);
	
	$pdf->Cell(3.5,0.2,"Areas Addressed based on student's needs:",'L',0,'L');
	
	$pdf->SetFont('Arial','',11);
	
	$pdf->Cell(3.5,0.2,'(Please check all that apply.)','R',1,'L');
	
	
	$pdf->Cell(7.0,0.2,'','LR',1,'C');
	
	
	$pdf->Cell(0.10,0.20, '', 'L', 0, 'C');
	
	$pdf->Cell(0.15,0.15, $_POST["18-Areas_Addressed_based_on_student's_needs:_Information_on_Course_Offerings"] ? 'X' : ' ',1,0,'C' );
	
	$pdf->Cell(0.25,0.20, '', 0, 0, 'C');
	
	$pdf->Cell(6.5,0.2,'Information of Course Offerings','R',1,'L');
	
	
	$pdf->Cell(0.10,0.20, '', 'L', 0, 'C');
	
	$pdf->Cell(0.15,0.15, $_POST["19-Areas_Addressed_based_on_student's_needs:_Career_Options"] ? 'X' : ' ',1,0,'C' );
	
	$pdf->Cell(0.25,0.20, '', 0, 0, 'C');
	
	$pdf->Cell(6.5,0.2,'Career Options','R',1,'L');
	
	
	$pdf->Cell(0.10,0.20, '', 'L', 0, 'C');
	
	$pdf->Cell(0.15,0.15, $_POST["20-Areas_Addressed_based_on_student's_needs:_Types_of_Academic_and_Occupational_Training_Needed_to_Succeed_in_Pre-ETS"] ? 'X' : ' ',1,0,'C' );
	
	$pdf->Cell(0.25,0.20, '', 0, 0, 'C');
	
	$pdf->Cell(6.5,0.2,'Types of Academic and Occupational Training Needed to Succeed in Pre-ETS','R',1,'L');
	
	
	$pdf->Cell(0.10,0.20, '', 'L', 0, 'C');
	
	$pdf->Cell(0.15,0.15, $_POST["21-Areas_Addressed_based_on_student's_needs:_Post-secondary_Opportunities_Associated_with_a_Career_Field_or_Pathway_(Please_check_all_that_apply)"] ? 'X' : ' ',1,0,'C' );
	
	$pdf->Cell(0.25,0.20, '', 0, 0, 'C');
	
	$pdf->Cell(6.5,0.2,'Post-secondary Opportunities Associated with a Career Field or Pathway','R',1,'L');
	
	
	$pdf->Cell(0.10,0.20, '', 'L', 0, 'C');
	
	$pdf->Cell(0.15,0.15, '',0,0,'C' );
	
	$pdf->Cell(0.25,0.20, '', 0, 0, 'C');
	
	$pdf->Cell(6.5,0.2,'(Please check all that apply):','R',1,'L');
	
	
	$pdf->Cell(1.10,0.20, '', 'L', 0, 'C');
	
	$pdf->Cell(0.15,0.15, $_POST['22-Post_secondary_Opportunities:_Community_Colleges_(AA/AS_degrees,_certificate_programs_and_classes)'] ? 'X' : ' ',1,0,'C' );
	
	$pdf->Cell(0.25,0.20, '', 0, 0, 'C');
	
	$pdf->Cell(5.5,0.2,'Community Colleges (AA/AS degrees, certificate programs and classes)','R',1,'L');
	
	
	$pdf->Cell(1.10,0.20, '', 'L', 0, 'C');
	
	$pdf->Cell(0.15,0.15, $_POST['23-Post_secondary_Opportunities:_Universities_(Public_and_Private)'] ? 'X' : ' ',1,0,'C' );
	
	$pdf->Cell(0.25,0.20, '', 0, 0, 'C');
	
	$pdf->Cell(5.5,0.2,'Universities (Public and Private)','R',1,'L');
	
	
	$pdf->Cell(1.10,0.20, '', 'L', 0, 'C');
	
	$pdf->Cell(0.15,0.15, $_POST['24-Post_secondary_Opportunities:_Career_Pathways_Related_to_Workshops_and_Training_Programs'] ? 'X' : ' ',1,0,'C' );
	
	$pdf->Cell(0.25,0.20, '', 0, 0, 'C');
	
	$pdf->Cell(5.5,0.2,'Career Pathways Related to Workstops and Training Programs','R',1,'L');
	
	
	$pdf->Cell(1.10,0.20, '', 'L', 0, 'C');
	
	$pdf->Cell(0.15,0.15, $_POST['25-Post_secondary_Opportunities:_Trade_and_Technical_Schools'] ? 'X' : ' ',1,0,'C' );
	
	$pdf->Cell(0.25,0.20, '', 0, 0, 'C');
	
	$pdf->Cell(5.5,0.2,'Trade and Technical schools','R',1,'L');
	
	
	$pdf->Cell(1.10,0.20, '', 'L', 0, 'C');
	
	$pdf->Cell(0.15,0.15, $_POST['26-Post_secondary_Opportunities:_Military'] ? 'X' : ' ',1,0,'C' );
	
	$pdf->Cell(0.25,0.20, '', 0, 0, 'C');
	
	$pdf->Cell(5.5,0.2,'Military','R',1,'L');
	
	
	$pdf->Cell(1.10,0.20, '', 'L', 0, 'C');
	
	$pdf->Cell(0.15,0.15, $_POST['27-Post_secondary_Opportunities:_Post-secondary_Programs_at_Community_Colleges_and_Universities_for_Students_with_Intellectual_and_Development_Disabilities'] ? 'X' : ' ',1,0,'C' );
	
	$pdf->Cell(0.25,0.20, '', 0, 0, 'C');
	
	$pdf->Cell(5.5,0.2,'Post-secondary Programs at Community Colleges and Universities','R',1,'L');
	
	
	$pdf->Cell(1.10,0.20, '', 'L', 0, 'C');
	
	$pdf->Cell(0.15,0.15, '', 0, 0,'C' );
	
	$pdf->Cell(0.25,0.20, '', 0, 0, 'C');
	
	$pdf->Cell(5.5,0.2,'for Students with Intellectual and Development Disabilities','R',1,'L');
	
	
	$pdf->Cell(1.10,0.20, '', 'L', 0, 'C');
	
	$pdf->Cell(0.15,0.15, $_POST['28-Post_secondary_Opportunities:_Individualized_Student_Strategies_to_Support_a_Smooth_Transition_from_High_School_to_Postsecondary_Education_(PSE)_(Please_check_all_that_apply)'] ? 'X' : ' ',1,0,'C' );
	
	$pdf->Cell(0.25,0.20, '', 0, 0, 'C');
	
	$pdf->Cell(5.5,0.2,'Individualized Student Strategies to Support a Smooth Transition','R',1,'L');
	
	
	$pdf->Cell(1.10,0.20, '', 'L', 0, 'C');
	
	$pdf->Cell(0.15,0.15, '', 0, 0,'C' );
	
	$pdf->Cell(0.25,0.20, '', 0, 0, 'C');
	
	$pdf->Cell(5.5,0.2,'from High School to Postsecondary Education (PSE)','R',1,'L');
	
	
	$pdf->Cell(1.10,0.20, '', 'L', 0, 'C');
	
	$pdf->Cell(0.15,0.15, '', 0, 0,'C' );
	
	$pdf->Cell(0.25,0.20, '', 0, 0, 'C');
	
	$pdf->Cell(5.5,0.2,'(Please check all that apply)','R',1,'L');
	
	
	// 	Indented Items Between these Lines
	
	$pdf->Cell(2.10,0.20, '', 'L', 0, 'C');
	
	$pdf->Cell(0.15,0.15, $_POST['29-Individualized_Student_Strategies_to_Support_a_Smooth_Transition:_Identify_Technology_Needs'] ? 'X' : ' ',1,0,'C' );
	
	$pdf->Cell(0.25,0.20, '', 0, 0, 'C');
	
	$pdf->Cell(4.5,0.2,'Identify Technology Needs','R',1,'L');
	
	
	$pdf->Cell(2.10,0.20, '', 'L', 0, 'C');
	
	$pdf->Cell(0.15,0.15, $_POST['30-Individualized_Student_Strategies_to_Support_a_Smooth_Transition:_Attend_College_Fairs,_Tours,_and_Connect_to_the_Disability_Support_Services'] ? 'X' : ' ',1,0,'C' );
	
	$pdf->Cell(0.25,0.20, '', 0, 0, 'C');
	
	$pdf->Cell(4.5,0.2,'Attend College Fairs, Tours, and Connect to','R',1,'L');
	
	
	$pdf->Cell(2.10,0.20, '', 'L', 0, 'C');
	
	$pdf->Cell(0.15,0.15, '', 0, 0, 'C' );
	
	$pdf->Cell(0.25,0.20, '', 0, 0, 'C');
	
	$pdf->Cell(4.5,0.2,'the Disability Support Services','R',1,'L');
	
	
	$pdf->Cell(2.10,0.20, '', 'L', 0, 'C');
	
	$pdf->Cell(0.15,0.15, $_POST['31-Individualized_Student_Strategies_to_Support_a_Smooth_Transition:_Other'] ? 'X' : ' ',1,0,'C' );
	
	$pdf->Cell(0.25,0.20, '', 0, 0, 'C');
	
	$pdf->Cell(1.25,0.2,'Other (Describe):',0 ,0 ,'L');
	
	$pdf->Cell(3.25,0.2, $_POST['32-If_other,_describe'],'R',1,'L');
	
	
	// 	Indented Items Between these Lines
	
	$pdf->Cell(1.10,0.20, '', 'L', 0, 'C');
	
	$pdf->Cell(0.15,0.15, $_POST['33-Post_secondary_Opportunities:_Advisement_on_Academic_Curricula'] ? 'X' : ' ',1,0,'C' );
	
	$pdf->Cell(0.25,0.20, '', 0, 0, 'C');
	
	$pdf->Cell(5.5,0.2,'Advisement on Academic Curricula','R',1,'L');
	
	
	$pdf->Cell(1.10,0.20, '', 'L', 0, 'C');
	
	$pdf->Cell(0.15,0.15, $_POST['34-Post_secondary_Opportunities:_Advisement_on_College_Application_and_Admission_Process'] ? 'X' : ' ',1,0,'C' );
	
	$pdf->Cell(0.25,0.20, '', 0, 0, 'C');
	
	$pdf->Cell(5.5,0.2,'Advisement on College Application and Admission Process','R',1,'L');
	
	
	$pdf->Cell(1.10,0.20, '', 'L', 0, 'C');
	
	$pdf->Cell(0.15,0.15, $_POST['35-Post_secondary_Opportunities:_Advisement_on_Completion_of_the_Free_Application_for_Federal_Student_Aid_(FAFSA)'] ? 'X' : ' ',1,0,'C' );
	
	$pdf->Cell(0.25,0.20, '', 0, 0, 'C');
	
	$pdf->Cell(5.5,0.2,'Advisement on Completion of the Free Application for Federal','R',1,'L');
	
	
	$pdf->Cell(1.10,0.20, '', 'L', 0, 'C');
	
	$pdf->Cell(0.15,0.15, '', 0, 0,'C' );
	
	$pdf->Cell(0.25,0.20, '', 0, 0, 'C');
	
	$pdf->Cell(5.5,0.2,'Student Aid (FASFA)','R',1,'L');
	
	
	$pdf->Cell(1.10,0.20, '', 'L', 0, 'C');
	
	$pdf->Cell(0.15,0.15, $_POST['36-Post_secondary_Opportunities:_Resources_that_may_be_used_to_Support_Individual_Student_Success_in_Education_and_Training,_to_Include_Disability_Support_Services'] ? 'X' : ' ',1,0,'C' );
	
	$pdf->Cell(0.25,0.20, '', 0, 0, 'C');
	
	$pdf->Cell(5.5,0.2,'Resources that may be used to Support Individual Student Success','R',1,'L');
	
	
	$pdf->Cell(1.10,0.20, '', 'L', 0, 'C');
	
	$pdf->Cell(0.15,0.15, '', 0, 0,'C' );
	
	$pdf->Cell(0.25,0.20, '', 0, 0, 'C');
	
	$pdf->Cell(5.5,0.2,'in Education and Training, to Include Disability Support Services','R',1,'L');
	
	
	$pdf->Cell(7.0,0.2,'','LR',1,'C');
	
	
	$pdf->SetFont('Arial','B',11);
	
	$pdf->Cell(7.0,0.2,"Has the participant actively demonstrated increased competency in the above areas?",'LR',1,'L');
	
	$pdf->SetFont('Arial','',11);
	
	$pdf->Cell(7.0,0.2,'','LR',1,'C');
	
	
	$pdf->Cell(1.10,0.20, '', 'L', 0, 'C');
	
	$pdf->Cell(0.15,0.15, $_POST['37-Has_the_participant_actively_demonstrated_increased_competency_in_the_above_areas:_Yes'] ? 'X' : ' ',1,0,'C' );
	
	$pdf->Cell(0.25,0.20, '', 0, 0, 'C');
	
	$pdf->Cell(0.50,0.2,'Yes', 0,0,'L');
	
	
	$pdf->Cell(0.60,0.20, '', 0, 0, 'C');
	
	$pdf->Cell(0.15,0.15, $_POST['38-Has_the_participant_actively_demonstrated_increased_competency_in_the_above_areas:_No'] ? 'X' : ' ',1,0,'C' );
	
	$pdf->Cell(0.25,0.20, '', 0, 0, 'C');
	
	$pdf->Cell(4.0,0.2,'No','R',1,'L');
	
	
	$pdf->Cell(7.0,0.2,"If Yes, please describe:",'LR',1,'L');
	
	$pdf->MultiCell(7.0,0.2, $_POST['39-If_yes,_please_describe'],'LR','j', 0);
	
	$pdf->Cell(7.0,0.2,'','LR',1,'C');
	
	
	$pdf->SetFont('Arial','B',11);
	
	$pdf->Cell(7.0,0.2,"Recommendations:",'LR',1,'L');
	
	$pdf->SetFont('Arial','',11);
	
	$pdf->MultiCell(7.0,0.2, $_POST['40-Recommendations*'],'LR','j', 0);
	
	
	$pdf->Cell(7.0,0.2,'','LBR',1,'C');
	
	
	// 	Start of FOOTER-1 Area
	$pdf->Ln();
	
	
	$pdf->SetFont('Arial','B',12);
	
	$pdf->Cell(1.0,0.2,'Completed By: ', 0, 1, 'L');
	
	$pdf->SetFont('Arial','',11);
	
	$pdf->Ln();
	
	
	$pdf->Cell(4.0,0.2,'', 'B', 0, 'L');
	$pdf->Cell(0.5,0.2,'', 0, 0, 'C');
	$pdf->Cell(2.5,0.2,$_POST['41-Signature_Date*'], 'B', 1, 'L');
	
	$pdf->Cell(4.0,0.2,'Signature Qualified Evaluator I', 0, 0, 'L');
	$pdf->Cell(0.5,0.2,'', 0, 0, 'C');
	$pdf->Cell(2.5,0.2,'Date', 0, 1, 'L');
	
	$pdf->Ln();
	
	
	$pdf->Cell(4.0,0.2,$_POST['42-Qualified_Evaluator_Printed_Name*'], 'B', 0, 'L');
	$pdf->Cell(0.5,0.2,'', 0, 0, 'C');
	$pdf->Cell(2.5,0.2,$_POST['43-Qualified_Evaluator_Title*'], 'B', 1, 'L');
	
	$pdf->Cell(4.0,0.2,'Printed Name', 0, 0, 'L');
	$pdf->Cell(0.5,0.2,'', 0, 0, 'C');
	$pdf->Cell(2.5,0.2,'Title', 0, 1, 'L');
	
	$pdf->Ln();
	
	$pdf->Cell(1.25,0.2,'Phone Number:', 0, 0, 'L');
	
	$pdf->Cell(2.75,0.2,$_POST['44-Phone_Number*'], 0, 0, 'L');
	
	$pdf->Cell(0.50,0.2,'', 0, 0, 'C');
	
	$pdf->Cell(0.50,0.2,'Email:', 0, 0, 'L');
	
	$pdf->Cell(2.00,0.2,$_POST['45-Email*'], 0, 1, 'L');
	
	$pdf->Ln();
	
	$pdf->Ln();
	
	
	$pdf->SetFont('Arial','B',12);
	
	$pdf->Cell(1.0,0.2,'Provider Supervisor: ', 0, 1, 'L');
	
	$pdf->SetFont('Arial','',11);
	
	$pdf->Ln();
	
	
	$pdf->Cell(4.0,0.2,'', 'B', 0, 'L');
	$pdf->Cell(0.5,0.2,'', 0, 0, 'C');
	$pdf->Cell(2.5,0.2,$_POST['46-Provider_Supervisor_Signature_Date'], 'B', 1, 'L');
	
	$pdf->Cell(4.0,0.2,'Signature Qualified Evaluator II', 0, 0, 'L');
	$pdf->Cell(0.5,0.2,'', 0, 0, 'C');
	$pdf->Cell(2.5,0.2,'Date', 0, 1, 'L');
	
	$pdf->Ln();
	
	$pdf->Cell(4.0,0.2,$_POST['47-Provider_Supervisor_Printed_Name'], 'B', 0, 'L');
	$pdf->Cell(0.5,0.2,'', 0, 0, 'C');
	$pdf->Cell(2.5,0.2,$_POST['48-Provider_Supervisor_Title'], 'B', 1, 'L');
	
	$pdf->Cell(4.0,0.2,'Printed Name', 0, 0, 'L');
	$pdf->Cell(0.5,0.2,'', 0, 0, 'C');
	$pdf->Cell(2.5,0.2,'Title', 0, 1, 'L');
	
	$pdf->Ln();
	
	//=	=========================
	$pdf->Output('report.pdf', 'I');
	
}


function renderForm_127X($data) {

	$pdf = new FPDF('P', 'in', 'Letter');
	
	$pdf->SetCreator('CEO, Inc.');
	
	$pdf->SetAuthor('CEO, Inc.');
	
	$pdf->SetTitle('Report');
	
	//=	=========================
	$pdf->AddPage('P','Letter');
	
	$pdf->SetFillColor(200,200,200);
	
	$pdf->SetMargins(0.75,0.25,0.75);
	
	
	$pdf->Image(ACCESLOGO,3.75,0.25,1.0,1.0);
	
	$pdf->Ln(0.85);
	
	
	$pdf->SetFont('Arial','B',10);
	
	$pdf->Cell(7.0,0.2,'VR-127X',0,0,'C');
	
	$pdf->Ln();
	
	
	$pdf->SetFont('Arial', 'B', 14);
	
	$pdf->Cell(7.0,0.2,'Pre-Employment Transition Services (Pre-ETS)',0,0,'C');
	
	$pdf->Ln(0.3);
	
	$pdf->SetFont('Arial','B',13);
	
	$pdf->Cell(7.0,0.2,'127X - Workplace Readiness Training to Develop Social Skills and',0,1,'C');
	
	$pdf->Cell(7.0,0.2,'Independent Living',0,1,'C');
	
	$pdf->Ln(0.3);
	
	
	// 	The section below COMMON-1 is on all documents
	
	$pdf->SetFont('Arial', '', 10);
	
	$pdf->Cell(1.75,0.2,'','',0,'L');
	
	$pdf->Cell(1.25,0.2,'AV#:', 'LTB', 0, 'L');
	
	$pdf->Cell(0.75,0.2,'(7 digits)','TB', 0, 'L');
	
	$pdf->Cell(1.25,0.2,$data->av_num,'TBR', 1, 'L');
	
	
	$pdf->Cell(1.75,0.2,'','',0,'L');
	
	$pdf->Cell(1.25,0.2,'ACCES-VR ID#:','LTB',0, 'L');
	
	$pdf->Cell(0.75,0.2,'(6 digits)','TB', 0, 'L');
	
	$pdf->Cell(1.25,0.2,$data->acces_id,'TBR', 1, 'L');
	
	
	$pdf->Cell(1.75,0.2,'','',0,'L');
	
	$pdf->Cell(1.25,0.2,'CAMS ID #:', 'LTB', 0, 'L');
	
	$pdf->Cell(0.75,0.2,'(10 digits)', 'TB', 0,'L');
	
	$pdf->Cell(1.25,0.2,$data->cams_id, 'TBR', 1,'L');
	
	
	$pdf->Ln();
	
	
	$pdf->SetFont('Arial','',10);
	
	$pdf->Cell(1.2,0.2,'VR District Office:','LT',0,'L');
	
	$pdf->Cell(2.3,0.2,$data->dist_office,'TR',0,'L');
	
	
	$pdf->Cell(1.0,0.2,'Provider:','LT',0,'L');
	
	$pdf->Cell(2.5,0.2,$data->provider,'TR',0,'L');
	
	$pdf->Ln();
	
	
	$pdf->Cell(1.2,0.2,'VRC Name:','LT',0,'L');
	
	$pdf->Cell(2.3,0.2,$data->vr_counselor,'TR',0,'L');
	
	
	$pdf->Cell(1.5,0.2,'NYS Fiscal System ID:','LTB',0,'L');
	
	$pdf->Cell(2.0,0.2,'1000018463','TRB',0,'L');
	
	$pdf->Ln();
	
	
	$pdf->Cell(3.5,0.2,'','LTBR',0,'L');
	
	$pdf->Cell(1.0,0.2,'Report Date:','LB',0,'L');
	
	$pdf->Cell(2.5,0.2,$_POST['8-Report_Date'],'BR',0,'L');
	
	$pdf->Ln();
	
	// 	End of COMMON-1 Area
	// 	Start of COMMON-2a Area  slight variations between forms
	
	$pdf->Ln();
	
	
	$pdf->Cell(1.5,0.2,'Student First Name:','LTB',0,'L');
	
	$pdf->Cell(2.0,0.2,$data->stu_fname ,'TBR',0,'L');
	
	$pdf->Cell(1.5,0.2,'Student Last Name:','LTB',0,'L');
	
	$pdf->Cell(2.0,0.2,$data->stu_lname ,'TBR',0,'L');
	
	$pdf->Ln();
	
	
	$pdf->Cell(1.5,0.2,'Student Phone Number: ','LTB',0,'L');
	
	$pdf->Cell(2.0,0.2,$_POST['11-Student_Phone_Number'],'TBR',0,'L');
	
	$pdf->Cell(1.5,0.2,'Student Age: ','LTB',0,'L');
	
	$pdf->Cell(2.0,0.2,$_POST['13-Student_Age'] ,'TBR',0,'L');
	
	$pdf->Ln();
	
	
	$pdf->Cell(2.0,0.2,'Student Email Address: ','LTB',0,'L');
	
	$pdf->Cell(5.0,0.2,$_POST['12-Student_Email_Address'],'TBR',0,'L');
	
	$pdf->Ln();
	
	
	// 	End of COMMON-2a Area
	
	// 	Start of CONTENT Area                        
	
	$pdf->Ln();
	
	$pdf->Ln();
	
	$pdf->SetFont('Arial','B',11);
	
	$pdf->Cell(3.0,0.2,'Units of Service (Hours):',0,0,'L');
	
	$pdf->SetFont('Arial','',11);
	
	$pdf->Cell(4.0,0.2,$_POST['14-Units_of_Service_(Hours)'],0,1,'L');
	
	$pdf->SetFont('Arial','B',11);
	
	$pdf->Cell(3.0,0.2,'Dates of Service:',0,0,'L');
	
	$pdf->SetFont('Arial','',11);
	
	$pdf->Cell(4.0,0.2,$_POST['15-Dates_of_Service'],0,1,'L');
	
	$pdf->Ln();
	
	
	$p1 = 'All providers of Workplace Readiness Training to develop social skills and independent living must submit a detailed, two-page syllabus on the content of the proposed Pre-ETS Workplace readiness training to develop social skills and independent living service (127X).';
	
	$p2 = "participant and the individual's progress (rating 1-4) acquiring soft skills and independent living.";
	
	$p3 = "aspects of work exceed grade level expectations and show exemplary performance or understanding.";
	
	$p4 = "indicate some aspects of skill that exceed expectations and demonstrate solid perfomance or understanding.";
	
	$p5 = "competencies acceptable expectations.  Performance and understanding are emerging or developing but there are some errors and mastery is not thorough.";
	
	$p6 = "adequate for expectations and indicates that the student has serious need for skill development and improvement.";
	
	
	$pdf->SetFont('Arial','',12);
	
	$pdf->MultiCell(7.0,0.2,$p1,0,'J', 0);
	
	$pdf->Ln();
	
	
	$pdf->SetFont('Arial','BU',12);
	
	$pdf->Cell(3.75,0.2,"Areas addressed based on student's needs:",0,0,'L');
	
	$pdf->SetFont('Arial','',12);
	
	$pdf->Cell(3.0,0.2,"List the type of services provided to the",0,1,'L');
	
	$pdf->MultiCell(7.0,0.2,$p2,0,'J', 0);
	
	$pdf->Ln();
	
	
	$pdf->SetFont('Arial','BU',12);
	
	$pdf->Cell(7.0,0.2,"List Soft skill of Independent Living Skill and provide rating scale defined:", 0, 1, 'L');
	
	$pdf->Ln();
	
	
	$pdf->SetFont('Arial','B',12);
	
	$pdf->Cell(7.0,0.2,"Rating Scale:", 0, 1, 'L');
	
	$pdf->SetFont('Arial','',12);
	
	
	$pdf->Cell(0.75,0.2,chr(183),0,0,'C');
	
	$pdf->Cell(1.05,0.2,"Level 4 is the ", 0, 0, 'L');
	
	$pdf->SetFont('Arial','B',12);
	
	$pdf->Cell(1.9,0.2,"Standard of excellence", 0, 0, 'L');
	
	$pdf->SetFont('Arial','',12);
	
	$pdf->Cell(1.0,0.2,"level. Descriptions should indicate that all", 0, 1, 'L');
	
	$pdf->Cell(0.75,0.2,'',0,0,'C');
	
	$pdf->MultiCell(6.25,0.2,$p3,0,'J', 0);
	
	$pdf->Ln();
	
	
	$pdf->Cell(0.75,0.2,chr(183),0,0,'C');
	
	$pdf->Cell(1.05,0.2,"Level 3 is the ", 0, 0, 'L');
	
	$pdf->SetFont('Arial','B',12);
	
	$pdf->Cell(2.9,0.2,"Approaching standard of excellence", 0, 0, 'L');
	
	$pdf->SetFont('Arial','',12);
	
	$pdf->Cell(1.0,0.2,"level. Descriptions should", 0, 1, 'L');
	
	$pdf->Cell(0.75,0.2,'',0,0,'C');
	
	
	$pdf->MultiCell(6.25,0.2,$p4,0,'J', 0);
	
	$pdf->Ln();
	
	
	$pdf->Cell(0.75,0.2,chr(183),0,0,'C');
	
	$pdf->Cell(1.05,0.2,"Level 2 is the ", 0, 0, 'L');
	
	$pdf->SetFont('Arial','B',12);
	
	$pdf->Cell(2.25,0.2,"Meets acceptable standard.", 0, 0, 'L');
	
	$pdf->SetFont('Arial','',12);
	
	$pdf->Cell(1.0,0.2,"This level should indicate minimal", 0, 1, 'L');
	
	$pdf->Cell(0.75,0.2,'',0,0,'C');
	
	$pdf->MultiCell(6.25,0.2,$p5,0,'J', 0);
	
	$pdf->Ln();
	
	
	$pdf->Cell(0.75,0.2,chr(183),0,0,'C');
	
	$pdf->Cell(0.60,0.2,"Level 1 ", 0, 0, 'L');
	
	$pdf->SetFont('Arial','B',12);
	
	$pdf->Cell(3.25,0.2,"Does not yet meet acceptable standard.", 0, 0, 'L');
	
	$pdf->SetFont('Arial','',12);
	
	$pdf->Cell(1.0,0.2,"This level indicates what is not", 0, 1, 'L');
	
	$pdf->Cell(0.75,0.2,'',0,0,'C');
	
	$pdf->MultiCell(6.25,0.2,$p6,0,'J', 0);
	
	$pdf->Ln();
	
	
	$pdf->SetFont('Arial','UB',12);
	
	$pdf->Cell(3.5,0.2,'List skill:', 0, 0, 'L');
	
	$pdf->Cell(3.5,0.2,'Progress in acquiring skills Rating (1-4):', 0, 0, 'L');
	
	$pdf->SetFont('Arial','',12);
	
	$pdf->Ln();
	
	
	$pdf->Cell(0.25,0.2,'1)',0,0,'L');
	
	$pdf->Cell(3.25,0.2,$_POST['16-List_Skill_1'],0,0,'L');
	
	$pdf->Cell(0.25,0.2,'1)',0,0,'L');
	
	$pdf->Cell(3.0,0.2,$_POST['17-Progress_in_acquiring_skills_Rating_(1-4)_1'],0,1,'L');
	
	
	$pdf->Cell(0.25,0.2,'2)',0,0,'L');
	
	$pdf->Cell(3.25,0.2,$_POST['18-List_Skill_2'],0,0,'L');
	
	$pdf->Cell(0.25,0.2,'2)',0,0,'L');
	
	$pdf->Cell(3.0,0.2,$_POST['19-Progress_in_acquiring_skills_Rating_(1-4)_2'],0,1,'L');
	
	
	$pdf->Cell(0.25,0.2,'3)',0,0,'L');
	
	$pdf->Cell(3.25,0.2,$_POST['20-List_Skill_3'],0,0,'L');
	
	$pdf->Cell(0.25,0.2,'3)',0,0,'L');
	
	$pdf->Cell(3.0,0.2,$_POST['21-Progress_in_acquiring_skills_Rating_(1-4)_3'],0,1,'L');
	
	
	$pdf->Cell(0.25,0.2,'4)',0,0,'L');
	
	$pdf->Cell(3.25,0.2,$_POST['22-List_Skill_4'],0,0,'L');
	
	$pdf->Cell(0.25,0.2,'4)',0,0,'L');
	
	$pdf->Cell(3.0,0.2,$_POST['23-Progress_in_acquiring_skills_Rating_(1-4)_4'],0,1,'L');
	
	
	$pdf->Cell(0.25,0.2,'5)',0,0,'L');
	
	$pdf->Cell(3.25,0.2,$_POST['24-List_Skill_5'],0,0,'L');
	
	$pdf->Cell(0.25,0.2,'5)',0,0,'L');
	
	$pdf->Cell(3.0,0.2,$_POST['25-Progress_in_acquiring_skills_Rating_(1-4)_5'],0,1,'L');
	
	
	$pdf->Cell(0.25,0.2,'6)',0,0,'L');
	
	$pdf->Cell(3.25,0.2,$_POST['26-List_Skill_6'],0,0,'L');
	
	$pdf->Cell(0.25,0.2,'6)',0,0,'L');
	
	$pdf->Cell(3.0,0.2,$_POST['27-Progress_in_acquiring_skills_Rating_(1-4)_6'],0,1,'L');
	
	
	$pdf->Cell(0.25,0.2,'7)',0,0,'L');
	
	$pdf->Cell(3.25,0.2,$_POST['28-List_Skill_7'],0,0,'L');
	
	$pdf->Cell(0.25,0.2,'7)',0,0,'L');
	
	$pdf->Cell(3.0,0.2,$_POST['29-Progress_in_acquiring_skills_Rating_(1-4)_7'],0,1,'L');
	
	
	$pdf->Cell(0.25,0.2,'8)',0,0,'L');
	
	$pdf->Cell(3.25,0.2,$_POST['30-List_Skill_8'],0,0,'L');
	
	$pdf->Cell(0.25,0.2,'8)',0,0,'L');
	
	$pdf->Cell(3.0,0.2,$_POST['31-Progress_in_acquiring_skills_Rating_(1-4)_8'],0,1,'L');
	
	
	$pdf->Cell(0.25,0.2,'9)',0,0,'L');
	
	$pdf->Cell(3.25,0.2,$_POST['32-List_Skill_9'],0,0,'L');
	
	$pdf->Cell(0.25,0.2,'9)',0,0,'L');
	
	$pdf->Cell(3.0,0.2,$_POST['33-Progress_in_acquiring_skills_Rating_(1-4)_9'],0,1,'L');
	
	
	$pdf->Cell(0.25,0.2,'10)',0,0,'L');
	
	$pdf->Cell(3.25,0.2,$_POST['34-List_Skill_10'],0,0,'L');
	
	$pdf->Cell(0.25,0.2,'10)',0,0,'L');
	
	$pdf->Cell(3.0,0.2,$_POST['35-Progress_in_acquiring_skills_Rating_(1-4)_10'],0,1,'L');
	
	
	$pdf->Ln();
	
	$pdf->SetFont('Arial','UB',12);
	
	$pdf->Cell(5.5,0.2,'Newly mastered skills and competencies (Direct result of the service)', 0, 0, 'L');
	
	$pdf->SetFont('Arial','B',12);
	
	$pdf->Cell(1.0,0.2,'  Please', 0, 1, 'L');
	
	$pdf->Cell(7.0,0.2,'check all that apply.', 0, 1, 'L');
	
	$pdf->Ln();
	
	
	$pdf->SetFont('Arial','',11);
	
	
	$pdf->Cell(0.15,0.15,$_POST['36-Newly_Mastered_Skill:_Independent_Living_Skills'] ? 'X' : ' ',1,0,'C');
	$pdf->Cell(0.35,0.2,'',0,0,'C');
	
	$pdf->Cell(3.0,0.2,'Independent Living Skills',0,0,'L');
	
	
	$pdf->Cell(0.15,0.15,$_POST['39-Newly_Mastered_Skill:_Social/Interpersonal_Skills'] ? 'X' : ' ',1,0,'C');
	$pdf->Cell(0.35,0.2,'',0,0,'C');
	
	$pdf->Cell(3.0,0.2,'Social/Interpersonal Skills',0,1,'L');
	
	
	$pdf->Cell(0.15,0.15,$_POST['37-Newly_Mastered_Skill:_Financial_Literacy'] ? 'X' : ' ',1,0,'C');
	$pdf->Cell(0.35,0.2,'',0,0,'C');
	
	$pdf->Cell(3.0,0.2,'Financial literacy',0,0,'L');
	
	
	$pdf->Cell(0.15,0.15,$_POST['40-Newly_Mastered_Skill:_Orientation_and_mobility_skills'] ? 'X' : ' ',1,0,'C');
	$pdf->Cell(0.35,0.2,'',0,0,'C');
	
	$pdf->Cell(3.0,0.2,'Orientation and mobility skills',0,1,'L');
	
	
	$pdf->Cell(0.15,0.15,$_POST['38-Newly_Mastered_Skill:_Job-seeking_Skills'] ? 'X' : ' ',1,0,'C');
	$pdf->Cell(0.35,0.2,'',0,0,'C');
	
	$pdf->Cell(3.0,0.2,'Job-seeking skills',0,0,'L');
	
	
	$pdf->Cell(0.15,0.15,$_POST['41-Newly_Mastered_Skill:_Understanding_employer_expectations_for_punctuality_and_performance'] ? 'X' : ' ',1,0,'C');
	$pdf->Cell(0.35,0.2,'',0,0,'C');
	
	$pdf->Cell(3.0,0.2,'Understanding employer expectations for',0,1,'L');
	
	
	$pdf->Cell(0.2,0.2,'',0,0,'C');
	$pdf->Cell(0.3,0.2,'',0,0,'C');
	
	$pdf->Cell(3.0,0.2,'',0,0,'C');
	
	
	$pdf->Cell(0.2,0.2,'',0,0,'C');
	$pdf->Cell(0.3,0.2,'',0,0,'C');
	
	$pdf->Cell(3.0,0.2,'punctuality and performance',0,1,'L');
	
	
	$pdf->Cell(0.15,0.15,$_POST['42-Newly_Mastered_Skill:_Other_soft_skills_necessary_for_employment'] ? 'X' : ' ',1,0,'C');
	$pdf->Cell(0.35,0.2,'',0,0,'C');
	
	$pdf->Cell(3.20,0.2,'Other "soft" skills necessary for employment:',0,0,'L');
	
	$pdf->Cell(4.65,0.2,'', 0, 0, 'L');
	//T	ODO: oskills_txt
	
	$pdf->Ln();
	
	$pdf->Ln();
	
	
	$pdf->SetFont('Arial','B',12);
	
	$pdf->Cell(7.0,0.2,'Has participant actively demonstrated increased competency in above areas?', 0, 1, 'L');
	
	$pdf->SetFont('Arial','',12);
	
	$pdf->Cell(0.50,0.2,'',0,0,'C');
	$pdf->Cell(0.15,0.15,$_POST['43-Participant_has_actively_demonstrated_increased_competency_in_above_areas:_Yes'] ? 'X' : ' ',1,0,'C');
	$pdf->Cell(0.35,0.2,'',0,0,'L');
	$pdf->Cell(2.0,0.2,'Yes',0,0,'L');
	
	$pdf->Cell(0.50,0.2,'',0,0,'C');
	$pdf->Cell(0.15,0.15,$_POST['44-Participant_has_actively_demonstrated_increased_competency_in_above_areas:_No'] ? 'X' : ' ',1,0,'C');
	$pdf->Cell(0.35,0.2,'',0,0,'L');
	$pdf->Cell(2.0,0.2,'No',0,1,'L');
	
	$pdf->Cell(0.50,0.2,'',0,0,'C');
	
	$pdf->MultiCell(6.50,0.2,$_POST['45-Explain'], 0, 'J', 0);
	
	
	$pdf->Ln();
	
	
	// 	Start of FOOTER-1 Area
	
	$pdf->SetFont('Arial','B',12);
	
	$pdf->Cell(1.0,0.2,'Completed By: ', 0, 1, 'L');
	
	$pdf->SetFont('Arial','',11);
	
	$pdf->Ln();
	
	
	$pdf->Cell(4.0,0.2,'', 'B', 0, 'L');
	$pdf->Cell(0.5,0.2,'', 0, 0, 'C');
	$pdf->Cell(2.5,0.2,$_POST['46-Date'], 'B', 1, 'L');
	
	$pdf->Cell(4.0,0.2,'Certified Staff Signature', 0, 0, 'L');
	$pdf->Cell(0.5,0.2,'', 0, 0, 'C');
	$pdf->Cell(2.5,0.2,'Date', 0, 1, 'L');
	
	$pdf->Ln();
	
	
	$pdf->Cell(4.0,0.2,$_POST['47-Printed_Name*'], 'B', 0, 'L');
	$pdf->Cell(0.5,0.2,'', 0, 0, 'C');
	$pdf->Cell(2.5,0.2,$_POST['48-Title*'], 'B', 1, 'L');
	
	$pdf->Cell(4.0,0.2,'Printed Name', 0, 0, 'L');
	$pdf->Cell(0.5,0.2,'', 0, 0, 'C');
	$pdf->Cell(2.5,0.2,'Title', 0, 1, 'L');
	
	$pdf->Ln();
	
	$pdf->Cell(1.25,0.2,'Phone Number:', 0, 0, 'L');
	
	$pdf->Cell(2.75,0.2,$_POST['49-Phone_Number*'], 0, 0, 'L');
	
	$pdf->Cell(0.50,0.2,'', 0, 0, 'C');
	
	$pdf->Cell(0.50,0.2,'Email:', 0, 0, 'L');
	
	$pdf->Cell(2.00,0.2,$_POST['49-Email*'], 0, 1, 'L');
	
	$pdf->Ln();
	
	$pdf->Ln();
	
	// 	End of FOOTER-1 Area
	//=	=========================
	$pdf->Output('report.pdf', 'I');
	
}


function renderForm_AVMPAR($data) {

	$pdf = new FPDF('P', 'in', 'Letter');
	
	$pdf->SetCreator('CEO, Inc.');
	
	$pdf->SetAuthor('CEO, Inc.');
	
	$pdf->SetTitle('Report');
	
	//=	=========================
	$pdf->AddPage('P','Letter');
	
	
	$pdf->SetFillColor(200,200,200);
	
	
	$pdf->SetMargins(0.75,0.25,0.75);
	
	
	
	$pdf->Image(ACCESLOGO,3.75,0.7,1.0,1.0);
	
	
	$pdf->Ln();
	
	
	
	$pdf->SetFont('Arial','B',10);
	
	
	$pdf->Cell(7.0,0.2,'VR-MPAR',0,0,'C');
	
	
	$pdf->Ln(1.5);
	
	
	
	$pdf->SetFont('Arial', 'B', 14);
	
	
	$pdf->Cell(7.0,0.2,'Job Placement Services',0,0,'C');
	
	
	$pdf->Ln(0.3);
	
	
	$pdf->SetFont('Arial','B',10);
	
	
	$pdf->Cell(7.0,0.2,'Monthly Placement Activity Report',0,1,'C');
	
	
	$pdf->Ln();
	
	
	
	$pdf->Cell(7.0,0.2,'Check Appropriate Box:',0,1,'L');
	
	
	$pdf->Ln(0.1);
	
	
	
	$pdf->Cell(0.5,0.2,'',0,0,'L');
	
	
	$pdf->Cell(0.20,0.2,$_POST['1-929X-Job_Seeking_and_Development_Services'] ? 'X' : ' ',1,0,'L');
	
	
	$pdf->Cell(0.05,0.2,'',0,0,'L');
	
	
	$pdf->Cell(6.25,0.2,'929X-Job Seeking and Development Services',0,1,'L');
	
	
	$pdf->Ln(0.1);
	
	
	
	$pdf->Cell(0.5,0.2,'',0,0,'L');
	
	
	$pdf->Cell(0.20,0.2,$_POST['2-935X-Job_Seeking_and_Development_Services_(Deaf_Service)'] ? 'X' : ' ',1,0,'L');
	
	
	$pdf->Cell(0.05,0.2,'',0,0,'L');
	
	
	$pdf->Cell(6.25,0.2,'935X-Job Seeking and Development Services (Deaf Service)',0,1,'L');
	
	
	$pdf->Ln(0.1);
	
	
	
	$pdf->Cell(0.5,0.2,'',0,0,'L');
	
	
	$pdf->Cell(0.20,0.2,$_POST['3-931X-Job_Placement'] ? 'X' : ' ',1,0,'L');
	
	
	$pdf->Cell(0.05,0.2,'',0,0,'L');
	
	
	$pdf->Cell(6.25,0.2,'931X-Job Placement',0,1,'L');
	
	
	$pdf->Ln(0.1);
	
	
	
	$pdf->Cell(0.5,0.2,'',0,0,'L');
	
	
	$pdf->Cell(0.20,0.2,$_POST['4-936X-Job_Placement_(Deaf_Service)'] ? 'X' : ' ',1,0,'L');
	
	
	$pdf->Cell(0.05,0.2,'',0,0,'L');
	
	
	$pdf->Cell(6.25,0.2,'936X-Job Placement (Deaf Service)',0,1,'L');
	
	
	$pdf->Ln(0.1);
	
	
	
	// 	The section below COMMON-1 is on all documents
	
	$pdf->SetFont('Arial', '', 10);
	
	
	$pdf->Cell(1.75,0.2,'','',0,'L');
	
	
	$pdf->Cell(1.25,0.2,'AV#:', 'LTB', 0, 'L');
	
	
	$pdf->Cell(0.75,0.2,'(7 digits)','TB', 0, 'L');
	
	
	$pdf->Cell(1.25,0.2,$_POST['5-AV#*'],'TBR', 1, 'L');
	
	
	
	$pdf->Cell(1.75,0.2,'','',0,'L');
	
	
	$pdf->Cell(1.25,0.2,'ACCES-VR ID#:','LTB',0, 'L');
	
	
	$pdf->Cell(0.75,0.2,'(6 digits)','TB', 0, 'L');
	
	
	$pdf->Cell(1.25,0.2,$_POST['6-ACCES-VR_ID#*'],'TBR', 1, 'L');
	
	
	
	$pdf->Cell(1.75,0.2,'','',0,'L');
	
	
	$pdf->Cell(1.25,0.2,'CAMS ID #:', 'LTB', 0, 'L');
	
	
	$pdf->Cell(0.75,0.2,'(10 digits)', 'TB', 0,'L');
	
	
	$pdf->Cell(1.25,0.2,$_POST['7-CAMS_ID#*'], 'TBR', 1,'L');
	
	
	
	$pdf->Ln();
	
	
	
	$pdf->SetFont('Arial','',10);
	
	
	$pdf->Cell(1.2,0.2,'VR District Office:','LT',0,'L');
	
	
	$pdf->Cell(2.3,0.2,$_POST['8-VR_District_Office*'],'TR',0,'L');
	
	
	
	$pdf->Cell(1.0,0.2,'Provider:','LT',0,'L');
	
	
	$pdf->Cell(2.5,0.2,$_POST['10-Provider*'],'TR',0,'L');
	
	
	$pdf->Ln();
	
	
	
	$pdf->Cell(1.2,0.2,'VRC Name:','LT',0,'L');
	
	
	$pdf->Cell(2.3,0.2,$_POST['9-VRC_Name*'],'TR',0,'L');
	
	
	
	$pdf->Cell(1.5,0.2,'NYS Fiscal System ID:','LTB',0,'L');
	
	
	$pdf->Cell(2.0,0.2,'1000018463','TRB',0,'L');
	
	
	$pdf->Ln();
	
	
	
	$pdf->Cell(3.5,0.2,'','LTBR',0,'L');
	
	
	$pdf->Cell(1.0,0.2,'Report Date:','LB',0,'L');
	
	
	$pdf->Cell(2.5,0.2,$_POST['Report_Date'],'BR',0,'L');
	
	
	$pdf->Ln();
	
	
	
	// 	End of COMMON-1 Area
	// 	Start of COMMON-2a Area  slight variations between forms
	
	$pdf->Ln();
	
	
	
	$pdf->Cell(1.5,0.2,'Participant First Name:','LTB',0,'L');
	
	
	$pdf->Cell(2.0,0.2,$_POST['13-Participant_First_Name*'] ,'TBR',0,'L');
	
	
	$pdf->Cell(1.5,0.2,'Participant Last Name:','LTB',0,'L');
	
	
	$pdf->Cell(2.0,0.2,$_POST['14-Participant_Last_Name*'] ,'TBR',0,'L');
	
	
	$pdf->Ln();
	
	
	
	$pdf->Cell(2.0,0.2,'Participant Phone Number: ','LTB',0,'L');
	
	
	$pdf->Cell(5.0,0.2,$_POST['15-Participant_Phone_Number'] ,'TBR',0,'L');
	
	
	$pdf->Ln();
	
	
	
	$pdf->Cell(2.0,0.2,'Participant Email Address: ','LTB',0,'L');
	
	
	$pdf->Cell(5.0,0.2,$_POST['16-Participant_Email_Address'],'TBR',0,'L');
	
	
	$pdf->Ln();
	
	
	
	// 	End of COMMON-2a Area
	
	// 	Start of CONTENT Area
	
	
	
	$pdf->Ln();
	
	
	$pdf->SetFont('Arial','B',10);
	
	
	$pdf->Cell(7.0,0.2,'Service Information',0,1,'L');
	
	
	$pdf->Ln(0.1);
	
	
	
	$pdf->SetFont('Arial','',12);
	
	
	$pdf->Cell(7.0,0.1,'','LTR',1,'L');
	
	
	
	$pdf->Cell(7.0,0.2,'Summarize the services provided during the report month: (Activities, number of','LR',1,'L');
	
	
	$pdf->Cell(7.0,0.2,'contact with the participant, level of participant partiipation, barriers addressed, and','LR',1,'L');
	
	
	$pdf->Cell(7.0,0.2,'ongoing issues needed to be resolved)','LR',1,'L');
	
	
	
	$pdf->SetFont('Arial','',10);
	
	
	$pdf->MultiCell(7.0,0.2,$_POST['17-Summarize_the_services_provided_during_the_report_month_(Activities,_number_of_contacts_with_the_participant,_level_of_participant_participation,_barriers_addressed,_and_ongoing_issues_needed_to_be_resolved)*'],'LR','J',0);
	
	
	$pdf->Cell(7.0,0.1,'','LR',1,'L');
	
	
	
	$pdf->Cell(4.0,0.2,'Hours of service provided this report month:','L',0,'L');
	
	
	$pdf->Cell(3.0,0.2,$_POST['18-Hours_of_service_provided_this_report_month*'],'R',1,'L');
	
	
	$pdf->Cell(7.0,0.1,'','LR',1,'L');
	
	
	
	$pdf->SetFont('Arial','B',12);
	
	
	$pdf->Cell(7.0,0.2,'Please note a minimum of 10 hours of service are required monthly.','LR',1,'L');
	
	
	
	$pdf->Cell(7.0,0.1,'','LBR',1,'L');
	
	
	$pdf->Ln(0.1);
	
	
	
	$pdf->SetFont('Arial','B',10);
	
	
	$pdf->Cell(1.50,0.2,'Date of Contact:','LTR',0,'L');
	
	
	$pdf->Cell(3.00,0.2,'Business Name:','LTR',0,'L');
	
	
	$pdf->Cell(2.50,0.2,'Name of Person Contacted:','LTR',1,'L');
	
	
	
	$pdf->SetFont('Arial','',10);
	
	
	$pdf->Cell(1.50,0.2,$_POST['19-Date_of_Contact*'],'LBR',0,'L');
	
	
	$pdf->Cell(3.00,0.2,$_POST['20-Business_Name*'],'LBR',0,'L');
	
	
	$pdf->Cell(2.50,0.2,$_POST['21-Name_of_Person_Contacted*'],'LBR',1,'L');
	
	
	
	$pdf->SetFont('Arial','B',10);
	
	
	$pdf->Cell(1.50,0.2,'Type of Contact:','LTR',0,'L');
	
	
	$pdf->Cell(5.50,0.2,'Result:','LTR',1,'L');
	
	
	$pdf->SetFont('Arial','',10);
	
	
	
	$pdf->Cell(1.50,0.2,$_POST['22-Type_of_Contact*'],'LBR',0,'L');
	
	
	$pdf->Cell(5.50,0.2,$_POST['23-Result*'],'LBR',1,'L');
	
	
	
	$pdf->SetFont('Arial','B',10);
	
	
	$pdf->Cell(7.00,0.2,'Comments:','LTR',1,'L');
	
	
	$pdf->SetFont('Arial','',10);
	

	$pdf->MultiCell(7.0,0.2,$_POST['24-Comments*'],'LBR','J',0);
	
	$pdf->Ln();
	
	
	
	$pdf->SetFont('Arial','B',10);
	
	
	$pdf->Cell(1.50,0.2,'Date of Contact:','LTR',0,'L');
	
	
	$pdf->Cell(3.00,0.2,'Business Name:','LTR',0,'L');
	
	
	$pdf->Cell(2.50,0.2,'Name of Person Contacted:','LTR',1,'L');
	
	
	
	$pdf->SetFont('Arial','',10);
	
	
	$pdf->Cell(1.50,0.2,$_POST['25-Date_of_Contact'],'LBR',0,'L');
	
	
	$pdf->Cell(3.00,0.2,$_POST['26-Business_Name'],'LBR',0,'L');
	
	
	$pdf->Cell(2.50,0.2,$_POST['27-Name_of_Person_Contacted'],'LBR',1,'L');
	
	
	
	$pdf->SetFont('Arial','B',10);
	
	
	$pdf->Cell(1.50,0.2,'Type of Contact:','LTR',0,'L');
	
	
	$pdf->Cell(5.50,0.2,'Result:','LTR',1,'L');
	
	
	
	$pdf->SetFont('Arial','',10);
	
	
	$pdf->Cell(1.50,0.2,$_POST['28-Type_of_Contact'],'LBR',0,'L');
	
	
	$pdf->Cell(5.50,0.2,$_POST['29-Result'],'LBR',1,'L');
	
	
	
	$pdf->SetFont('Arial','B',10);
	
	
	$pdf->Cell(7.00,0.2,'Comments:','LTR',1,'L');
	
	
	$pdf->SetFont('Arial','',10);
	
	$pdf->MultiCell(7.0,0.2,$_POST['30-Comments*'],'LBR','J',0);
	
	
	$pdf->Ln();
	
	
	
	$pdf->SetFont('Arial','B',10);
	
	
	$pdf->Cell(1.50,0.2,'Date of Contact:','LTR',0,'L');
	
	
	$pdf->Cell(3.00,0.2,'Business Name:','LTR',0,'L');
	
	
	$pdf->Cell(2.50,0.2,'Name of Person Contacted:','LTR',1,'L');
	
	
	
	$pdf->SetFont('Arial','',10);
	
	
	$pdf->Cell(1.50,0.2,$_POST['31-Date_of_Contact'],'LBR',0,'L');
	
	
	$pdf->Cell(3.00,0.2,$_POST['32-Business_Name'],'LBR',0,'L');
	
	
	$pdf->Cell(2.50,0.2,$_POST['33-Name_of_Person_Contacted'],'LBR',1,'L');
	
	
	
	$pdf->SetFont('Arial','B',10);
	
	
	$pdf->Cell(1.50,0.2,'Type of Contact:','LTR',0,'L');
	
	
	$pdf->Cell(5.50,0.2,'Result:','LTR',1,'L');
	
	
	
	$pdf->SetFont('Arial','',10);
	
	
	$pdf->Cell(1.50,0.2,$_POST['34-Type_of_Contact'],'LBR',0,'L');
	
	
	$pdf->Cell(5.50,0.2,$_POST['35-Result'],'LBR',1,'L');
	
	
	
	$pdf->SetFont('Arial','B',10);
	
	
	$pdf->Cell(7.00,0.2,'Comments:','LTR',1,'L');
	
	
	$pdf->SetFont('Arial','',10);

	$pdf->MultiCell(7.0,0.2,$_POST['36-Comments*'],'LBR','J',0);
	
	$pdf->Ln();
	
	
	
	$pdf->SetFont('Arial','B',10);
	
	
	$pdf->Cell(1.50,0.2,'Date of Contact:','LTR',0,'L');
	
	
	$pdf->Cell(3.00,0.2,'Business Name:','LTR',0,'L');
	
	
	$pdf->Cell(2.50,0.2,'Name of Person Contacted:','LTR',1,'L');
	
	
	
	$pdf->SetFont('Arial','',10);
	
	
	$pdf->Cell(1.50,0.2,$_POST['37-Date_of_Contact'],'LBR',0,'L');
	
	
	$pdf->Cell(3.00,0.2,$_POST['38-Business_Name'],'LBR',0,'L');
	
	
	$pdf->Cell(2.50,0.2,$_POST['39-Name_of_Person_Contacted'],'LBR',1,'L');
	
	
	
	$pdf->SetFont('Arial','B',10);
	
	
	$pdf->Cell(1.50,0.2,'Type of Contact:','LTR',0,'L');
	
	
	$pdf->Cell(5.50,0.2,'Result:','LTR',1,'L');
	
	
	
	$pdf->SetFont('Arial','',10);
	
	
	$pdf->Cell(1.50,0.2,$_POST['40-Type_of_Contact'],'LBR',0,'L');
	
	
	$pdf->Cell(5.50,0.2,$_POST['41-Result'],'LBR',1,'L');
	
	
	
	$pdf->SetFont('Arial','B',10);
	
	
	$pdf->Cell(7.00,0.2,'Comments:','LTR',1,'L');
	
	
	$pdf->SetFont('Arial','',10);
	
	
	$pdf->MultiCell(7.0,0.2,$_POST['42-Comments*'],'LBR','J',0);
	
	
	
	$pdf->Ln();
	
	
	
	$pdf->SetFont('Arial','B',10);
	
	
	$pdf->Cell(1.50,0.2,'Date of Contact:','LTR',0,'L');
	
	
	$pdf->Cell(3.00,0.2,'Business Name:','LTR',0,'L');
	
	
	$pdf->Cell(2.50,0.2,'Name of Person Contacted:','LTR',1,'L');
	
	
	
	$pdf->SetFont('Arial','',10);
	
	
	$pdf->Cell(1.50,0.2,$_POST['43-Date_of_Contact'],'LBR',0,'L');
	
	
	$pdf->Cell(3.00,0.2,$_POST['44-Business_Name'],'LBR',0,'L');
	
	
	$pdf->Cell(2.50,0.2,$_POST['45-Name_of_Person_Contacted'],'LBR',1,'L');
	
	
	
	$pdf->SetFont('Arial','B',10);
	
	
	$pdf->Cell(1.50,0.2,'Type of Contact:','LTR',0,'L');
	
	
	$pdf->Cell(5.50,0.2,'Result:','LTR',1,'L');
	
	
	
	$pdf->SetFont('Arial','',10);
	
	
	$pdf->Cell(1.50,0.2,$_POST['46-Type_of_Contact'],'LBR',0,'L');
	
	
	$pdf->Cell(5.50,0.2,$_POST['47-Result'],'LBR',1,'L');
	
	
	
	$pdf->SetFont('Arial','B',10);
	
	
	$pdf->Cell(7.00,0.2,'Comments:','LTR',1,'L');
	
	
	$pdf->SetFont('Arial','',10);
	
	
	$pdf->MultiCell(7.0,0.2,$_POST['48-Comments*'],'LBR','J',0);
	
	
	
	$pdf->Ln();
	
	
	
	$pdf->SetFont('Arial','B',10);
	
	
	$pdf->Cell(1.50,0.2,'Date of Contact:','LTR',0,'L');
	
	
	$pdf->Cell(3.00,0.2,'Business Name:','LTR',0,'L');
	
	
	$pdf->Cell(2.50,0.2,'Name of Person Contacted:','LTR',1,'L');
	
	
	
	$pdf->SetFont('Arial','',10);
	
	
	$pdf->Cell(1.50,0.2,$_POST['49-Date_of_Contact'],'LBR',0,'L');
	
	
	$pdf->Cell(3.00,0.2,$_POST['50-Business_Name'],'LBR',0,'L');
	
	
	$pdf->Cell(2.50,0.2,$_POST['51-Name_of_Person_Contacted'],'LBR',1,'L');
	
	
	
	$pdf->SetFont('Arial','B',10);
	
	
	$pdf->Cell(1.50,0.2,'Type of Contact:','LTR',0,'L');
	
	
	$pdf->Cell(5.50,0.2,'Result:','LTR',1,'L');
	
	
	
	$pdf->SetFont('Arial','',10);
	
	
	$pdf->Cell(1.50,0.2,$_POST['52-Type_of_Contact'],'LBR',0,'L');
	
	
	$pdf->Cell(5.50,0.2,$_POST['53-Result'],'LBR',1,'L');
	
	
	
	$pdf->SetFont('Arial','B',10);
	
	
	$pdf->Cell(7.00,0.2,'Comments:','LTR',1,'L');
	
	
	$pdf->SetFont('Arial','',10);
	
	
	$pdf->MultiCell(7.0,0.2,$_POST['54-Comments*'],'LBR','J',0);
	
	
	
	$pdf->Ln(0.1);
	
	
	// 	Start of FOOTER-1 Area
	
	$pdf->SetFont('Arial','B',12);
	
	
	$pdf->Cell(1.0,0.2,'Completed By: ', 0, 1, 'L');
	
	
	$pdf->SetFont('Arial','',11);
	
	
	$pdf->Ln();
	
	
	
	$pdf->Cell(4.0,0.2,'', 'B', 0, 'L');
	
	$pdf->Cell(0.5,0.2,'', 0, 0, 'C');
	
	$pdf->Cell(2.5,0.2,$_POST['55-Signature_Date'], 'B', 1, 'L');
	
	
	$pdf->Cell(4.0,0.2,'Qualified Staff Signature', 0, 0, 'L');
	
	$pdf->Cell(0.5,0.2,'', 0, 0, 'C');
	
	$pdf->Cell(2.5,0.2,'Date', 0, 1, 'L');
	
	
	$pdf->Ln();
	
	
	
	$pdf->Cell(4.0,0.2,$_POST['56-Printed_Name*'], 'B', 0, 'L');
	
	$pdf->Cell(0.5,0.2,'', 0, 0, 'C');
	
	$pdf->Cell(2.5,0.2,$_POST['57-Title*'], 'B', 1, 'L');
	
	
	$pdf->Cell(4.0,0.2,'Printed Name', 0, 0, 'L');
	
	$pdf->Cell(0.5,0.2,'', 0, 0, 'C');
	
	$pdf->Cell(2.5,0.2,'Title', 0, 1, 'L');
	
	
	$pdf->Ln();
	
	
	$pdf->Cell(1.25,0.2,'Phone Number:', 0, 0, 'L');
	
	
	$pdf->Cell(2.75,0.2,$_POST['58-Phone_Number*'], 0, 0, 'L');
	
	
	$pdf->Cell(0.50,0.2,'', 0, 0, 'C');
	
	
	$pdf->Cell(0.50,0.2,'Email:', 0, 0, 'L');
	
	
	$pdf->Cell(2.00,0.2,$_POST['59-Email*'], 0, 1, 'L');
	
	
	$pdf->Ln();
	
	//=	=========================
	$pdf->Output('report.pdf', 'I');
	
}

function renderForm_959X563X($data) {

	$pdf = new FPDF('P', 'in', 'Letter');
	
	$pdf->SetCreator('CEO, Inc.');
	
	$pdf->SetAuthor('CEO, Inc.');
	
	$pdf->SetTitle('Report');
	
	//=	=========================
	$pdf->AddPage('P','Letter');
	
	$pdf->SetFillColor(200,200,200);
	
	$pdf->SetMargins(0.75,0.5,0.75);
	
	$pdf->SetXY(0.39, 0.5);
	
	
	$pdf->Image(ACCESLOGO,3.75,0.25,1.0,1.0);
	
	$pdf->Ln(0.85);
	
	
	$pdf->SetFont('Arial','B',10);
	
	$pdf->Cell(7.0,0.2,'VR-959X/VR-563X',0,0,'C');
	
	$pdf->Ln();
	
	
	/*
    $pdf->SetDrawColor(200,200,200);
    $pdf->Line(0.25,0.25,8.25,0.25);      //Top Line
    $pdf->Line(0.25,10.75,8.25,10.75);    //Bottom Line
    $pdf->Line(0.25,0.25,0.25,10.75);     //Left Line
    $pdf->Line(8.25,0.25,8.25,10.75);     //Right Line
  
    $pdf->Line(4.125,0.25,4.125,10.75);     //Middle Vertical
    */
	
	
	$pdf->Ln(0.3);
	
	
	$pdf->Ln(0.2);
	
	
	$pdf->SetFont('Times','B',17);
	
	$pdf->Cell(7.0,0.2,'Job Placement Services','',0,'C');
	
	$pdf->Ln(0.3);
	
	
	$pdf->SetFont('Times','B',12);
	
	$pdf->Cell(7.0,0.2,'Check Appropriate Box:','',1,'L');
	
	$pdf->Ln(0.2);
	
	
	// 	CheckBox Code here !!!!!
	$pdf->SetFont('Zapfdingbats','B',12);
	
	if ($_POST['1-959X-Coaching_Supports_for_Employment'] == true) $check = "4";
	else $check = " ";
	
	$pdf->Cell(0.15,0.2,'','',0,'L');
	
	$pdf->Cell(0.15,0.15,$check,1,0,'L');
	
	$pdf->Cell(0.25,0.2,'','',0,'L');
	
	$pdf->SetFont('Times','B',12);
	
	$pdf->MultiCell(6.5,0.2,'959X-Coaching Supports for Employment', 0 ,'L');
	
	
	// 	CheckBox Code here !!!!!
	$pdf->SetFont('Zapfdingbats','B',12);
	
	$checkvalue = ($data->code_563 == 1);
	
	if ($_POST['2-563X-Coaching_Supports_for_Employment-Deaf_Service'] == true) $check = "4";
	else $check = " ";
	
	$pdf->Cell(0.15,0.2,'','',0,'L');
	
	$pdf->Cell(0.15,0.15,$check,1,0,'L');
	
	$pdf->Cell(0.25,0.2,'','',0,'L');
	
	$pdf->SetFont('Times','B',12);
	
	$pdf->MultiCell(6.5,0.2,'563X-Coaching Supports for Employment-Deaf Service', 0, 'L');
	
	
	$pdf->Ln();
	
	
	// 	The section below COMMON-1 is on all documents
	
	$pdf->SetFont('Arial', '', 10);
	
	$pdf->Cell(1.75,0.2,'','',0,'L');
	
	$pdf->Cell(1.25,0.2,'AV#:', 'LTB', 0, 'L');
	
	$pdf->Cell(0.75,0.2,'(7 digits)','TB', 0, 'L');
	
	$pdf->Cell(1.25,0.2,$_POST['2-AV#*'],'TBR', 1, 'L');
	
	
	$pdf->Cell(1.75,0.2,'','',0,'L');
	
	$pdf->Cell(1.25,0.2,'ACCES-VR ID#:','LTB',0, 'L');
	
	$pdf->Cell(0.75,0.2,'(6 digits)','TB', 0, 'L');
	
	$pdf->Cell(1.25,0.2,$_POST['3-ACCES-VR_ID#*'],'TBR', 1, 'L');
	
	
	$pdf->Cell(1.75,0.2,'','',0,'L');
	
	$pdf->Cell(1.25,0.2,'CAMS ID #:', 'LTB', 0, 'L');
	
	$pdf->Cell(0.75,0.2,'(10 digits)', 'TB', 0,'L');
	
	$pdf->Cell(1.25,0.2,$_POST['4-CAMS_ID#*'], 'TBR', 1,'L');
	
	
	$pdf->Ln();
	
	
	$pdf->SetFont('Arial','',10);
	
	$pdf->Cell(1.2,0.2,'VR District Office:','LT',0,'L');
	
	$pdf->Cell(2.3,0.2,$_POST['5-VR_District_Office*'],'TR',0,'L');
	
	
	$pdf->Cell(1.0,0.2,'Provider:','LT',0,'L');
	
	$pdf->Cell(2.5,0.2,$_POST['7-Provider*'],'TR',0,'L');
	
	$pdf->Ln();
	
	
	$pdf->Cell(1.2,0.2,'VRC Name:','LT',0,'L');
	
	$pdf->Cell(2.3,0.2,$_POST['6-VRC_Name*'],'TR',0,'L');
	
	
	$pdf->Cell(1.5,0.2,'NYS Fiscal System ID:','LTB',0,'L');
	
	$pdf->Cell(2.0,0.2,'1000018463','TRB',0,'L');
	
	$pdf->Ln();
	
	
	$pdf->Cell(3.5,0.2,'','LTBR',0,'L');
	
	$pdf->Cell(1.0,0.2,'Report Date:','LB',0,'L');
	
	$pdf->Cell(2.5,0.2,$_POST['8-Report_Date'],'BR',0,'L');
	
	$pdf->Ln();
	
	// 	End of COMMON-1 Area
	// 	Start of COMMON-2a Area  slight variations between forms
	
	$pdf->Ln();
	
	
	$pdf->Cell(1.5,0.2,'Participant First Name:','LTB',0,'L');
	
	$pdf->Cell(2.0,0.2,$_POST['10-Participant_First_Name*'] ,'TBR',0,'L');
	
	$pdf->Cell(1.5,0.2,'Student Last Name:','LTB',0,'L');
	
	$pdf->Cell(2.0,0.2,$_POST['11-Participant_Last_Name*'] ,'TBR',0,'L');
	
	$pdf->Ln();
	
	
	$pdf->Cell(2.0,0.2,'Participant Phone Number: ','LTB',0,'L');
	
	$pdf->Cell(5.0,0.2,$_POST['12-Participant_Phone_Number'],'TBR',0,'L');
	
	$pdf->Ln();
	
	$pdf->Cell(2.0,0.2,'Participant Email Address: ','LTB',0,'L');
	
	$pdf->Cell(5.0,0.2,$_POST['13-Participant_Email_Address'],'TBR',0,'L');
	
	$pdf->Ln();
	
	$pdf->Ln();
	
	
	// 	End of COMMON-2a Area
	
	
	$pdf->SetFont('Arial','B',10);
	
	
	$pdf->Ln(0.2);
	
	
	$pdf->Cell(1.75,0.02,'SERVICE INFORMATION','',1,'C');
	
	
	$pdf->Ln(0.2);
	
	
	$pdf->Cell(7.0,0.02,'','LTR',1,'C');
	
	$pdf->MultiCell(7,0.2,'', 'LR', 'J');
	//S	pacing
	$pdf->MultiCell(7,0.2,'1. Total Number of hour Authorized for 959X/563X: ' . $_POST['14-Total_Number_of_hours_Authorized_for_959X/563X*'], 'LR', 'J');
	
	$pdf->MultiCell(7,0.2,'', 'LR', 'J');
	//S	pacing
	$pdf->MultiCell(7,0.2,'2. Total Number of hours provided during this report month: ' . $_POST['15-Total_Number_of_hours_provided_during_this_report_month*'], 'LR', 'J');
	
	$pdf->MultiCell(7,0.2,'', 'LR', 'J');
	//S	pacing
	$pdf->MultiCell(7,0.2,'3. Total Number of hours used to date (Include total number of hours provided during this report month): ' . $_POST['16-Total_Number_of_hours_used_to_date_(Include_total_number_of_hours_provided_during_this_report_month)*'], 'LR', 'J');
	
	$pdf->MultiCell(7,0.2,'', 'LR', 'J');
	//S	pacing
	$pdf->Cell(7.0,0.02,'','LBR',1,'C');
	
	
	$pdf->Ln(0.3);
	
	
	$pdf->SetFont('Arial','',10);
	
	
	$text1 = 'Please provide detailed description of services provided to the participant including service date(s), numbers of hours, barrier addressed and/or ongoing issues to resolve. If additional services are needed a justification is required.';
	
	$fieldtext = $_POST['17-Please_provide_detailed_description_of_services_provided_to_the_participant_including_service_dates,_number_of_hours,_barrier_addressed_and/or_ongoing_issues_to_resolve,_If_additional_services_are_needed_a_justification_is_required*'];
	
	
	$pdf->Cell(7.0,0.02,'','LTR',1,'C');
	
	$pdf->MultiCell(7,0.2,$text1, 'LR', 'J');
	
	$pdf->MultiCell(7,0.2,$fieldtext, 'LR', 'J');
	
	$pdf->Cell(7.0,0.02,'','LBR',1,'C');
	
	
	$pdf->SetFont('Times','',10);
	
	
	$pdf->Ln(0.3);
	
	
	// 	Start of FOOTER-1 Area
	
	$pdf->SetFont('Arial','B',12);
	
	$pdf->Cell(1.0,0.2,'Completed By: ', 0, 1, 'L');
	
	$pdf->SetFont('Arial','',11);
	
	$pdf->Ln();
	
	
	$pdf->Cell(4.0,0.2,'', 'B', 0, 'L');
	$pdf->Cell(0.5,0.2,'', 0, 0, 'C');
	$pdf->Cell(2.5,0.2,$_POST['18-Signature_Date'], 'B', 1, 'L');
	
	$pdf->Cell(4.0,0.2,'Certified Staff Signature', 0, 0, 'L');
	$pdf->Cell(0.5,0.2,'', 0, 0, 'C');
	$pdf->Cell(2.5,0.2,'Date', 0, 1, 'L');
	
	$pdf->Ln();
	
	
	$pdf->Cell(4.0,0.2,$_POST['19-Printed_Name*'], 'B', 0, 'L');
	$pdf->Cell(0.5,0.2,'', 0, 0, 'C');
	$pdf->Cell(2.5,0.2,$_POST['20-Title*'], 'B', 1, 'L');
	
	$pdf->Cell(4.0,0.2,'Printed Name', 0, 0, 'L');
	$pdf->Cell(0.5,0.2,'', 0, 0, 'C');
	$pdf->Cell(2.5,0.2,'Title', 0, 1, 'L');
	
	$pdf->Ln();
	
	$pdf->Cell(1.25,0.2,'Phone Number:', 0, 0, 'L');
	
	$pdf->Cell(2.75,0.2,$_POST['21-Phone_Number*'], 0, 0, 'L');
	
	$pdf->Cell(0.50,0.2,'', 0, 0, 'C');
	
	$pdf->Cell(0.50,0.2,'Email:', 0, 0, 'L');
	
	$pdf->Cell(2.00,0.2,$_POST['22-Email*'], 0, 1, 'L');
	
	$pdf->Ln();
	
	$pdf->Ln();
	
	// 	End of FOOTER-1 Area
	//=	=========================
	$pdf->Output('report.pdf', 'I');
	
}

function renderForm_110X($data) {
	
	$pdf = new FPDF('P', 'in', 'Letter');

	$pdf->SetCreator('CEO, Inc.');
	
	$pdf->SetAuthor('CEO, Inc.');
	
	$pdf->SetTitle('Report');
	
	//=	=========================
	$pdf->AddPage('P','Letter');
	
	$pdf->SetFillColor(200,200,200);
	
	$pdf->SetMargins(0.75,0.25,0.75);
	
	
	$pdf->Image(ACCESLOGO,3.75,0.25,1.0,1.0);
	
	$pdf->Ln(0.85);
	
	
	$pdf->SetFont('Arial','B',10);
	
	$pdf->Cell(7.0,0.2,'VR-110X',0,0,'C');
	
	$pdf->Ln();
	
	
	$pdf->SetFont('Arial', 'B', 14);
	
	$pdf->Cell(7.0,0.2,'Assessment Services',0,0,'C');
	
	$pdf->Ln(0.3);
	
	$pdf->SetFont('Arial','B',12);
	
	$pdf->Cell(7.0,0.2,'110X - Diagnostic Vocational Evaluation (DVE)/Community Based',0,1,'C');
	
	$pdf->Cell(7.0,0.2,'Situational Assessment',0,0,'C');
	
	$pdf->Ln(0.3);
	
	
	// 	The section below COMMON-1 is on all documents
	
	$pdf->SetFont('Arial', '', 10);
	
	$pdf->Cell(1.75,0.2,'','',0,'L');
	
	$pdf->Cell(1.25,0.2,'AV#:', 'LTB', 0, 'L');
	
	$pdf->Cell(0.75,0.2,'(7 digits)','TB', 0, 'L');
	
	$pdf->Cell(1.25,0.2,$data->av_num,'TBR', 1, 'L');
	
	
	$pdf->Cell(1.75,0.2,'','',0,'L');
	
	$pdf->Cell(1.25,0.2,'ACCES-VR ID#:','LTB',0, 'L');
	
	$pdf->Cell(0.75,0.2,'(6 digits)','TB', 0, 'L');
	
	$pdf->Cell(1.25,0.2,$data->acces_id,'TBR', 1, 'L');
	
	
	$pdf->Cell(1.75,0.2,'','',0,'L');
	
	$pdf->Cell(1.25,0.2,'CAMS ID #:', 'LTB', 0, 'L');
	
	$pdf->Cell(0.75,0.2,'(10 digits)', 'TB', 0,'L');
	
	$pdf->Cell(1.25,0.2,$data->cams_id, 'TBR', 1,'L');
	
	
	$pdf->Ln();
	
	$pdf->SetFont('Arial','',10);
	
	$pdf->Cell(1.2,0.2,'VR District Office:','LT',0,'L');
	
	$pdf->Cell(2.3,0.2,$data->dist_office,'TR',0,'L');
	
	
	$pdf->Cell(1.0,0.2,'Provider:','LT',0,'L');
	
	$pdf->Cell(2.5,0.2,$data->provider,'TR',0,'L');
	
	$pdf->Ln();
	
	
	$pdf->Cell(1.2,0.2,'VRC Name:','LT',0,'L');
	
	$pdf->Cell(2.3,0.2,$data->vr_counselor,'TR',0,'L');
	
	
	$pdf->Cell(1.5,0.2,'NYS Fiscal System ID:','LTB',0,'L');
	
	$pdf->Cell(2.0,0.2,'1000018463','TRB',0,'L');
	
	$pdf->Ln();
	
	
	$pdf->Cell(3.5,0.2,'','LTBR',0,'L');
	
	$pdf->Cell(1.0,0.2,'Report Date:','LB',0,'L');
	
	$pdf->Cell(2.5,0.2,$_POST['8-Report_Date*'],'BR',0,'L');
	
	$pdf->Ln();
	
	
	// 	End of COMMON-1 Area
	// 	Start of COMMON-2a Area  slight variations between forms
	$pdf->Ln();
	
	
	$pdf->Cell(1.5,0.2,'Participant First Name:','LTB',0,'L');
	
	$pdf->Cell(2.0,0.2,$_POST['9-Participant_First_Name*'],'TBR',0,'L');
	
	$pdf->Cell(1.5,0.2,'Participant Last Name:','LTB',0,'L');
	
	$pdf->Cell(2.0,0.2,$_POST['10-Participant_Last_Name*'],'TBR',0,'L');
	
	$pdf->Ln();
	
	
	$pdf->Cell(2.0,0.2,'Participant Phone Number: ','LTB',0,'L');
	
	$pdf->Cell(5.0,0.2,$_POST['11-Participant_Phone_Number'],'TBR',0,'L');
	
	$pdf->Ln();
	
	
	$pdf->Cell(2.0,0.2,'Participant Email Address: ','LTB',0,'L');
	
	$pdf->Cell(5.0,0.2,$_POST['12-Participant_Email_Address'],'TBR',0,'L');
	
	$pdf->Ln();
	
	
	$pdf->Ln();
	
	
	// 	End of COMMON-2a Area
	$pdf->SetFont('Arial','B',11);
	
	
	$pdf->Cell(7.0,0.2,'','LTR',1);
	
	$pdf->Cell(0.25,0.2,'1.','L',0);
	$pdf->Cell(2.0,0.2,'Units of Service Utilized:',0,0,'L');
	$pdf->SetFont('Arial','',11);
	$pdf->Cell(0.25,0.2,'',0,0,'L');
	$pdf->Cell(4.50,0.2,$_POST['13-Units_of_Service_Utilized*'],'R',1,'L');
	
	$pdf->Cell(0.25,0.2,''  ,'L',0);
	$pdf->Cell(6.75,0.2,'Unit: Day (5 hour minimum) Half Unit: Half-day (2.5 hour minimum)','R',1,'L');
	
	$pdf->Cell(7.0,0.2,'','LR',1);
	
	$pdf->SetFont('Arial','B',11);
	
	$pdf->Cell(0.25,0.2,'2.','L',0);
	$pdf->Cell(2.0,0.2,'Dates of Service:',0,0,'L');
	$pdf->SetFont('Arial','',11);
	$pdf->Cell(0.25,0.2,'',0,0,'L');
	$pdf->Cell(4.50,0.2,$_POST['14-Dates_of_Service*'],'R',1,'L');
	
	$pdf->Cell(7.0,0.2,'','LR',1);
	
	$pdf->SetFont('Arial','B',11);
	
	$pdf->Cell(0.25,0.2,'3.','L',0);
	$pdf->Cell(6.75,0.2,'Briefly describe evaluation process that was utilized:','R',1,'L');
	
	$pdf->SetFont('Arial','',11);
	
	$pdf->Cell(0.25,0.2,'  ','L',0);
	$pdf->Cell(6.75,0.2,'Detailed Vocational Assessment Report is required to be submitted with the VR-110X.','R',1,'L');
	
	$pdf->Cell(0.25,NbLines($pdf, 6.75, $_POST['15-Briefly_describe_evaluation_process_that_was_utilized*'])*0.2,'  ','L',0);
	$pdf->MultiCell(6.75,0.2,$_POST['15-Briefly_describe_evaluation_process_that_was_utilized*'],'R','J',0);
	
	$pdf->Cell(7.0,0.2,'','LR',1);
	
	$pdf->SetFont('Arial','B',11);
	
	$pdf->Cell(0.25,0.2,'4.','L',0);
	$pdf->Cell(6.75,0.2,'Was this evaluation completed in an individual or group format?','R',1,'L');
	
	$pdf->Cell(7.0,0.2,'','LR',1);
	
	$pdf->SetFont('Arial','',11);
	
	$pdf->Cell(2.00,0.2,'  ','L',0);
	
	$pdf->Cell(0.15,0.15, $_POST['16-Was_this_evaluation_completed_in_an_individual_or_group_format:_Individual'] ? 'X' : ' ', 1, 0, 'C');
	
	$pdf->Cell(1.50,0.15, 'Individual', 0, 0, 'C');
	
	$pdf->Cell(0.15,0.15, $_POST['17-Was_this_evaluation_completed_in_an_individual_or_group_format:_Group'] ? 'X' : ' ', 1, 0, 'C');
	
	$pdf->Cell(1.50,0.15, 'Group', '', 0, 'C');
	
	$pdf->Cell(1.70,0.2,'  ','R',1,'L');
	
	$pdf->Cell(7.0,0.2,'','LR',1);
	
	
	$pdf->SetFont('Arial','B',11);
	
	$pdf->Cell(0.25,0.2,'5.','L',0);
	$pdf->Cell(6.75,0.2,'Was this report submitted within 10 business days of the service completion?','R',1,'L');
	
	$pdf->Cell(7.0,0.2,'','LR',1);
	
	$pdf->SetFont('Arial','',11);
	
	$pdf->Cell(2.00,0.2,'  ','L',0);
	
	$pdf->Cell(0.15,0.15, $_POST['18-Was_this_report_submitted_within_10_business_days_of_the_service_completion:_Yes'] ? 'X' : ' ', 1, 0, 'C');
	
	$pdf->Cell(1.50,0.15, 'Yes', 0, 0, 'C');
	
	$pdf->Cell(0.15,0.15, $_POST['19-Was_this_report_submitted_within_10_business_days_of_the_service_completion:_No'] ? 'X' : ' ', 1, 0, 'C');
	
	$pdf->Cell(1.50,0.15, 'No', '', 0, 'C');
	
	$pdf->Cell(1.70,0.2,'  ','R',1,'L');
	
	$pdf->SetFont('Arial','B',11);
	
	$pdf->Cell(0.25,0.2,'','L',0);
	$pdf->Cell(6.75,0.2,'If no, explain:','R',1,'L');
	
	$pdf->SetFont('Arial','',11);
	
	$pdf->Cell(0.25,NbLines($pdf, 6.75, $_POST['20-If_not_submitted_within_10_business_days_of_the_service,_explain'])*0.2,'  ','L',0);
	$pdf->MultiCell(6.75,0.2,$_POST['20-If_not_submitted_within_10_business_days_of_the_service,_explain'],'R','J',0);
	
	$pdf->Cell(7.0,0.2,'','LR',1);
	
	
	$pdf->SetFont('Arial','B',11);
	
	$pdf->Cell(0.25,0.2,'6.','L',0);
	$pdf->Cell(6.75,0.2,'Was the VRC offered to attend the conference at the conclusion of the service?','R',1,'L');
	
	$pdf->Cell(7.0,0.2,'','LR',1);
	
	$pdf->SetFont('Arial','',11);
	
	$pdf->Cell(2.00,0.2,'  ','L',0);
	
	$pdf->Cell(0.15,0.15, $_POST['21-Was_the_VRC_offered_to_attend_the_conference_at_the_conclusion_of_the_service:_Yes'] ? 'X' : ' ', 1, 0, 'C');
	
	$pdf->Cell(1.50,0.15, 'Yes', 0, 0, 'C');
	
	$pdf->Cell(0.15,0.15, $_POST['22-Was_the_VRC_offered_to_attend_the_conference_at_the_conclusion_of_the_service:_No'] ? 'X' : ' ', 1, 0, 'C');
	
	$pdf->Cell(1.50,0.15, 'No', '', 0, 'C');
	
	$pdf->Cell(1.70,0.2,'  ','R',1,'L');
	
	$pdf->Cell(7.0,0.2,'','LR',1);
	
	
	
	
	$pdf->SetFont('Arial','B',11);
	
	$pdf->Cell(0.25,0.2,'7.','L',0);
	$pdf->Cell(6.75,0.2,'Was the service completed in full?','R',1,'L');
	
	$pdf->Cell(7.0,0.2,'','LR',1);
	
	$pdf->SetFont('Arial','',11);
	
	$pdf->Cell(2.00,0.2,'  ','L',0);
	
	$pdf->Cell(0.15,0.15, $_POST['23-Was_the_service_completed_in_full:_Yes'] ? 'X' : ' ', 1, 0, 'C');
	
	$pdf->Cell(1.50,0.15, 'Yes', 0, 0, 'C');
	
	$pdf->Cell(0.15,0.15, $_POST['24-Was_the_service_completed_in_full:_No'] ? 'X' : ' ', 1, 0, 'C');
	
	$pdf->Cell(1.50,0.15, 'No', '', 0, 'C');
	
	$pdf->Cell(1.70,0.2,'  ','R',1,'L');
	
	$pdf->SetFont('Arial','B',11);
	
	$pdf->Cell(0.25,0.2,'','L',0);
	$pdf->Cell(6.75,0.2,'If no, explain:','R',1,'L');
	
	$pdf->SetFont('Arial','',11);
	
	$pdf->Cell(0.25,NbLines($pdf, 6.75, $_POST['25-If_not_completed_in_full,_explain'])*0.2,'  ','L',0);
	$pdf->MultiCell(6.75,0.2,$_POST['25-If_not_completed_in_full,_explain'],'R','J',0);
	
	$pdf->Cell(7.0,0.2,'','LR',1);
	
	
	$pdf->Cell(7.0,0.2,'','LBR',1);
	
	
	$pdf->Ln();
	
	$pdf->SetFont('Arial','',12);
	
	$pdf->MultiCell(7.0,0.2,'The Vocational Assessment Service Report was reviewed and agreed to by ACCES-VR VRC on the date listed below (Maintain documentation of this in participant record):',0,'J',0);
	
	$pdf->Ln();
	
	$pdf->Cell(0.20, 0.2, '', 0, 0);
	
	$pdf->Cell(0.15, 0.15, $_POST['26-The_Vocational_Assessment_Service_Report_was_reviewed_and_agreed_to_by_ACCES-VR_VRC_on_the_date_listed_below:_Yes'] ? 'X' : ' ', 1, 0);
	
	$pdf->Cell(0.20, 0.2, '', 0, 0);
	$pdf->Cell(0.70, 0.2, 'Yes', 0, 0, 'L');
	
	$pdf->Cell(0.15, 0.15, $_POST['27-The_Vocational_Assessment_Service_Report_was_reviewed_and_agreed_to_by_ACCES-VR_VRC_on_the_date_listed_below:_No'] ? 'X' : ' ', 1, 0);
	
	$pdf->Cell(0.20, 0.2, '', 0, 0);
	$pdf->Cell(0.70, 0.2, 'No', 0, 0, 'L');
	
	$pdf->Cell(0.20, 0.2, '', 0, 0);
	$pdf->Cell(1.5, 0.2, $_POST['28-Reviewed_Date'], 'B', 1, 'C');
	
	$pdf->Cell(2.50, 0.2, '', 0, 0);
	$pdf->Cell(1.5, 0.2, 'Date', 0, 1, 'C');
	
	
	$pdf->Ln();
	
	
	// 	Start of FOOTER-1 Area
	
	$pdf->SetFont('Arial','B',12);
	
	$pdf->Cell(1.0,0.2,'Completed By: ', 0, 1, 'L');
	
	$pdf->SetFont('Arial','',11);
	
	$pdf->Ln();
	
	
	$pdf->Cell(4.0,0.2,'', 'B', 0, 'L');
	$pdf->Cell(0.5,0.2,'', 0, 0, 'C');
	$pdf->Cell(2.5,0.2,$_POST['29-Signature_Date*'], 'B', 1, 'L');
	
	$pdf->Cell(4.0,0.2,'Signature of Qualified Evaluator I', 0, 0, 'L');
	$pdf->Cell(0.5,0.2,'', 0, 0, 'C');
	$pdf->Cell(2.5,0.2,'Date', 0, 1, 'L');
	
	$pdf->Ln();
	
	
	$pdf->Cell(4.0,0.2,$_POST['30-Qualified_Evaluator_Printed_Name*'], 'B', 0, 'L');
	$pdf->Cell(0.5,0.2,'', 0, 0, 'C');
	$pdf->Cell(2.5,0.2,$_POST['31-Qualified_Evaluator_Title*'], 'B', 1, 'L');
	
	$pdf->Cell(4.0,0.2,'Printed Name', 0, 0, 'L');
	$pdf->Cell(0.5,0.2,'', 0, 0, 'C');
	$pdf->Cell(2.5,0.2,'Title', 0, 1, 'L');
	
	$pdf->Ln();
	
	$pdf->Cell(1.25,0.2,'Phone Number:', 0, 0, 'L');
	
	$pdf->Cell(2.75,0.2,$_POST['32-Phone_Number*'], 0, 0, 'L');
	
	$pdf->Cell(0.50,0.2,'', 0, 0, 'C');
	
	$pdf->Cell(0.50,0.2,'Email:', 0, 0, 'L');
	
	$pdf->Cell(2.00,0.2,$_POST['33-Email*'], 0, 1, 'L');
	
	$pdf->Ln();
	
	$pdf->Ln();
	
	
	$pdf->SetFont('Arial','B',12);
	
	$pdf->Cell(1.0,0.2,'Provider Supervisor: ', 0, 1, 'L');
	
	$pdf->SetFont('Arial','',11);
	
	$pdf->Ln();
	
	
	$pdf->Cell(4.0,0.2,'', 'B', 0, 'L');
	$pdf->Cell(0.5,0.2,'', 0, 0, 'C');
	$pdf->Cell(2.5,0.2,$_POST['34-Provider_Supervisor_Signature_Date'], 'B', 1, 'L');
	
	$pdf->Cell(4.0,0.2,'Signature of Qualified Evaluator II Supervisor', 0, 0, 'L');
	$pdf->Cell(0.5,0.2,'', 0, 0, 'C');
	$pdf->Cell(2.5,0.2,'Date', 0, 1, 'L');
	
	$pdf->Ln();
	
	$pdf->Cell(4.0,0.2,$_POST['35-Provider_Supervisor_Printed_Name'], 'B', 0, 'L');
	$pdf->Cell(0.5,0.2,'', 0, 0, 'C');
	$pdf->Cell(2.5,0.2,$_POST['36-Provider_Supervisor_Title'], 'B', 1, 'L');
	
	$pdf->Cell(4.0,0.2,'Printed Name', 0, 0, 'L');
	$pdf->Cell(0.5,0.2,'', 0, 0, 'C');
	$pdf->Cell(2.5,0.2,'Title', 0, 1, 'L');
	
	$pdf->Ln();
	
	// 	End of FOOTER-1 Area
	//=	=========================
	$pdf->Output('report.pdf', 'I');
	
}

function renderForm_124X($data) {
	
	$pdf = new FPDF('P', 'in', 'Letter');

	$pdf->SetCreator('CEO, Inc.');
	
	$pdf->SetAuthor('CEO, Inc.');
	
	$pdf->SetTitle('Report');
	
	//=	=========================
	$pdf->AddPage('P','Letter');
	
	$pdf->SetFillColor(200,200,200);
	
	$pdf->SetMargins(0.75,0.25,0.75);
	
	
	$pdf->Image(ACCESLOGO,3.75,0.25,1.0,1.0);
	
	$pdf->Ln(0.85);
	
	
	$pdf->SetFont('Arial','B',10);
	
	$pdf->Cell(7.0,0.2,'VR-124X',0,0,'C');
	
	$pdf->Ln();
	
	
	$pdf->SetFont('Arial', 'B', 14);
	
	$pdf->Cell(7.0,0.2,'Pre-Employment Transition Services (Pre-ETS)',0,0,'C');
	
	$pdf->Ln(0.3);
	
	$pdf->SetFont('Arial','B',13);
	
	$pdf->Cell(7.0,0.2,'124X- Instruction in Self-Advocacy',0,1,'C');
	
	$pdf->Ln(0.3);
	
	
	// 	The section below COMMON-1 is on all documents
	
	$pdf->SetFont('Arial', '', 10);
	
	$pdf->Cell(1.75,0.2,'','',0,'L');
	
	$pdf->Cell(1.25,0.2,'AV#:', 'LTB', 0, 'L');
	
	$pdf->Cell(0.75,0.2,'(7 digits)','TB', 0, 'L');
	
	$pdf->Cell(1.25,0.2,$data->av_num,'TBR', 1, 'L');
	
	
	$pdf->Cell(1.75,0.2,'','',0,'L');
	
	$pdf->Cell(1.25,0.2,'ACCES-VR ID#:','LTB',0, 'L');
	
	$pdf->Cell(0.75,0.2,'(6 digits)','TB', 0, 'L');
	
	$pdf->Cell(1.25,0.2,$data->acces_id,'TBR', 1, 'L');
	
	
	$pdf->Cell(1.75,0.2,'','',0,'L');
	
	$pdf->Cell(1.25,0.2,'CAMS ID #:', 'LTB', 0, 'L');
	
	$pdf->Cell(0.75,0.2,'(10 digits)', 'TB', 0,'L');
	
	$pdf->Cell(1.25,0.2,$data->cams_id, 'TBR', 1,'L');
	
	
	$pdf->Ln();
	
	
	$pdf->SetFont('Arial','',10);
	
	$pdf->Cell(1.2,0.2,'VR District Office:','LT',0,'L');
	
	$pdf->Cell(2.3,0.2,$data->dist_office,'TR',0,'L');
	
	
	$pdf->Cell(1.0,0.2,'Provider:','LT',0,'L');
	
	$pdf->Cell(2.5,0.2,$data->provider,'TR',0,'L');
	
	$pdf->Ln();
	
	
	$pdf->Cell(1.2,0.2,'VRC Name:','LT',0,'L');
	
	$pdf->Cell(2.3,0.2,$data->vr_counselor,'TR',0,'L');
	
	
	$pdf->Cell(1.5,0.2,'NYS Fiscal System ID:','LTB',0,'L');
	
	$pdf->Cell(2.0,0.2,'1000018463','TRB',0,'L');
	
	$pdf->Ln();
	
	
	$pdf->Cell(3.5,0.2,'','LTBR',0,'L');
	
	$pdf->Cell(1.0,0.2,'Report Date:','LB',0,'L');
	
	$pdf->Cell(2.5,0.2,$_POST['8-Report_Date'],'BR',0,'L');
	
	$pdf->Ln();
	
	// 	End of COMMON-1 Area
	// 	Start of COMMON-2a Area  slight variations between forms
	
	$pdf->Ln();
	
	
	$pdf->Cell(1.5,0.2,'Student First Name:','LTB',0,'L');
	
	$pdf->Cell(2.0,0.2,$data->stu_fname ,'TBR',0,'L');
	
	$pdf->Cell(1.5,0.2,'Student Last Name:','LTB',0,'L');
	
	$pdf->Cell(2.0,0.2,$data->stu_lname ,'TBR',0,'L');
	
	$pdf->Ln();
	
	
	$pdf->Cell(1.5,0.2,'Student Phone Number: ','LTB',0,'L');
	
	$pdf->Cell(2.0,0.2,$_POST['11-Student_Phone_Number'],'TBR',0,'L');
	
	$pdf->Cell(1.5,0.2,'Student Age: ','LTB',0,'L');
	
	$pdf->Cell(2.0,0.2,$_POST['12-Student_Age*'] ,'TBR',0,'L');
	
	$pdf->Ln();
	
	
	$pdf->Cell(2.0,0.2,'Student Email Address: ','LTB',0,'L');
	
	$pdf->Cell(5.0,0.2,$_POST['13-Student_Email_Address'],'TBR',0,'L');
	
	$pdf->Ln();
	
	$pdf->Ln();
	
	$pdf->Ln();
	
	// 	End of COMMON-2a Area
	
	// 	Start of CONTENT Area
	
	$pdf->Cell(7.0,0.2,'','LTR',1,'C');
	
	
	$pdf->SetFont('Arial','B',11);
	
	$pdf->Cell(2.5,0.2,'Units of Service (Hours):','L',0,'L');
	
	$pdf->SetFont('Arial','',11);
	
	//$	pdf->Cell(0.4,0.2,'',0,0,'L');
	
	$pdf->Cell(0.75,0.2,$_POST['14-Units_of_Service_(Hours)*'],0,0,'R');
	
	$pdf->Cell(3.75,0.2,'','R',1,'C');
	
	
	$pdf->Cell(7.0,0.2,'','LR',1,'C');
	
	
	$pdf->SetFont('Arial','B',11);
	
	$pdf->Cell(2.0,0.2,'Dates of Service Delivery:','L',0,'L');
	
	$pdf->SetFont('Arial','',11);
	
	//$	pdf->Cell(0.4,0.2,'',0,0,'L');
	
	$pdf->Cell(4.5,0.2,$_POST['15-Dates_of_Service_Delivery*'],0,0,'L');
	
	$pdf->Cell(0.5,0.2,'','R',1,'C');
	
	
	$pdf->Cell(7.0,0.2,'','LR',1,'C');
	
	
	$pdf->SetFont('Arial','B',11);
	
	$pdf->Cell(2.5,0.2,'Service Delivery Format:','L',0,'L');
	
	$pdf->SetFont('Arial','',11);
	
	$pdf->Cell(0.15,0.15, $_POST['16-Service_Delivery_Format:_Individual_Service'] ? 'X' : ' ',1,0,'C');
	
	$pdf->Cell(0.2,0.2,'',0,0,'L');
	
	$pdf->Cell(1.5,0.2,'Individual Service',0,0,'L');
	
	$pdf->Cell(0.15,0.15, $_POST['17-Service_Delivery_Format:_Group_Service'] ? 'X' : ' ',1,0,'C');
	
	$pdf->Cell(0.2,0.2,'',0,0,'L');
	
	$pdf->Cell(2.0,0.2,'Student and Family Member',0,0,'L');
	
	$pdf->Cell(0.3,0.2,'','R',1,'C');
	
	
	$pdf->SetFont('Arial','B',11);
	
	$pdf->Cell(7.0,0.2,'','LR',1,'L');
	
	$pdf->Cell(7.0,0.2,"Areas Addressed Based on Student's Needs:",'LR',1,'L');
	
	$pdf->SetFont('Arial','',11);
	
	$pdf->MultiCell(7.0,0.2, $_POST["18-Areas_Addressed_Based_on_Student's_Needs"],'LR','j', 0);
	
	$pdf->SetFont('Arial','B',11);
	
	$pdf->Cell(7.0,0.2,'','LR',1,'L');
	
	$pdf->Cell(7.0,0.2,"Newly Mastered Skills and Competencies (Direct Result of Service) Please check all that apply.",'LR',1,'L');
	
	$pdf->Cell(7.0,0.2,'','LR',1,'L');
	
	$pdf->SetFont('Arial','',11);
	
	
	//=	=Checkbox Row
	$pdf->Cell(0.20,0.2,'','L',0,'L');
	
	$pdf->Cell(0.15,0.15, $_POST['19-Newly_Mastered_Skills_and_Competencies_(Direct_Result_of_Service):_Identify_Independence'] ? 'X' : ' ',1,0,'C');
	
	$pdf->Cell(0.2,0.2,'',0,0,'L');
	
	$pdf->Cell(2.0,0.2,'Identify Independence',0,0,'L');
	
	$pdf->Cell(0.15,0.15, $_POST['20-Newly_Mastered_Skills_and_Competencies_(Direct_Result_of_Service):_Personal_Strengths'] ? 'X' : ' ',1,0,'C');
	
	$pdf->Cell(0.2,0.2,'',0,0,'L');
	
	$pdf->Cell(2.0,0.2,'Personal Strengths',0,0,'L');
	
	$pdf->Cell(0.15,0.15, $_POST['21-Newly_Mastered_Skills_and_Competencies_(Direct_Result_of_Service):_Talents'] ? 'X' : ' ',1,0,'C');
	
	$pdf->Cell(0.2,0.2,'',0,0,'L');
	
	$pdf->Cell(1.75,0.2,'Talents',0,0,'L');
	
	$pdf->Cell(7.0,0.2,'','LR',1,'L');
	
	//=	=End Checkbox Row
	
	//=	=Checkbox Row
	$pdf->Cell(0.20,0.2,'','L',0,'L');
	
	$pdf->Cell(0.15,0.15, $_POST['22-Newly_Mastered_Skills_and_Competencies_(Direct_Result_of_Service):_Ability_to_Evaluate_Options'] ? 'X' : ' ',1,0,'C');
	
	$pdf->Cell(0.2,0.2,'',0,0,'L');
	
	$pdf->Cell(2.0,0.2,'Ability to Evaluate Options',0,0,'L');
	
	$pdf->Cell(0.15,0.15, $_POST['23-Newly_Mastered_Skills_and_Competencies_(Direct_Result_of_Service):_Natural_Supports'] ? 'X' : ' ',1,0,'C');
	
	$pdf->Cell(0.2,0.2,'',0,0,'L');
	
	$pdf->Cell(2.0,0.2,'Natural Supports',0,0,'L');
	
	$pdf->Cell(0.15,0.15, $_POST['24-Newly_Mastered_Skills_and_Competencies_(Direct_Result_of_Service):_Assertiveness'] ? 'X' : ' ',1,0,'C');
	
	$pdf->Cell(0.2,0.2,'',0,0,'L');
	
	$pdf->Cell(1.75,0.2,'Assertiveness',0,0,'L');
	
	$pdf->Cell(7.0,0.2,'','LR',1,'L');
	
	//=	=End Checkbox Row
	
	//=	=Checkbox Row
	$pdf->Cell(0.20,0.2,'','L',0,'L');
	
	$pdf->Cell(0.15,0.15, $_POST['25-Newly_Mastered_Skills_and_Competencies_(Direct_Result_of_Service):_Compensatory_Skills'] ? 'X' : ' ',1,0,'C');
	
	$pdf->Cell(0.2,0.2,'',0,0,'L');
	
	$pdf->Cell(2.0,0.2,'Compensatory Skills',0,0,'L');
	
	$pdf->Cell(0.15,0.15, $_POST['26-Newly_Mastered_Skills_and_Competencies_(Direct_Result_of_Service):_Disability_Disclosure'] ? 'X' : ' ',1,0,'C');
	
	$pdf->Cell(0.2,0.2,'',0,0,'L');
	
	$pdf->Cell(2.0,0.2,'Disability Disclosure',0,0,'L');
	
	$pdf->Cell(0.15,0.15, $_POST['27-Newly_Mastered_Skills_and_Competencies_(Direct_Result_of_Service):_Leadership_Skills'] ? 'X' : ' ',1,0,'C');
	
	$pdf->Cell(0.2,0.2,'',0,0,'L');
	
	$pdf->Cell(1.75,0.2,'Leadership Skills',0,0,'L');
	
	$pdf->Cell(7.0,0.2,'','LR',1,'L');
	
	//=	=End Checkbox Row
	
	//=	=Checkbox Row
	$pdf->Cell(0.20,0.2,'','L',0,'L');
	
	$pdf->Cell(0.15,0.15, $_POST['28-Newly_Mastered_Skills_and_Competencies_(Direct_Result_of_Service):_Leading_Support_Plans'] ? 'X' : ' ',1,0,'C');
	
	$pdf->Cell(0.2,0.2,'',0,0,'L');
	
	$pdf->Cell(2.0,0.2,'Leading Support Plans',0,0,'L');
	
	$pdf->Cell(0.15,0.15, $_POST['29-Newly_Mastered_Skills_and_Competencies_(Direct_Result_of_Service):_Problem_Solving'] ? 'X' : ' ',1,0,'C');
	
	$pdf->Cell(0.2,0.2,'',0,0,'L');
	
	$pdf->Cell(2.0,0.2,'Problem Solving',0,0,'L');
	
	$pdf->Cell(0.15,0.15, $_POST['30-Newly_Mastered_Skills_and_Competencies_(Direct_Result_of_Service):_Self_Awareness'] ? 'X' : ' ',1,0,'C');
	
	$pdf->Cell(0.2,0.2,'',0,0,'L');
	
	$pdf->Cell(1.75,0.2,'Self-awareness',0,0,'L');
	
	$pdf->Cell(7.0,0.2,'','LR',1,'L');
	
	//=	=End Checkbox Row
	
	//=	=Checkbox Row
	$pdf->Cell(0.20,0.2,'','L',0,'L');
	
	$pdf->Cell(0.15,0.15, $_POST['31-Newly_Mastered_Skills_and_Competencies_(Direct_Result_of_Service):_How_to_Request_Help'] ? 'X' : ' ',1,0,'C');
	
	$pdf->Cell(0.2,0.2,'',0,0,'L');
	
	$pdf->Cell(2.0,0.2,'How to Request Help',0,0,'L');
	
	$pdf->Cell(0.15,0.15, $_POST['32-Newly_Mastered_Skills_and_Competencies_(Direct_Result_of_Service):_Self-monitoring'] ? 'X' : ' ',1,0,'C');
	
	$pdf->Cell(0.2,0.2,'',0,0,'L');
	
	$pdf->Cell(2.0,0.2,'Self-monitoring',0,0,'L');
	
	$pdf->Cell(0.15,0.15, $_POST['33-Newly_Mastered_Skills_and_Competencies_(Direct_Result_of_Service):_Listening_Skills'] ? 'X' : ' ',1,0,'C');
	
	$pdf->Cell(0.2,0.2,'',0,0,'L');
	
	$pdf->Cell(1.75,0.2,'Listening Skills',0,0,'L');
	
	$pdf->Cell(7.0,0.2,'','LR',1,'L');
	
	//=	=End Checkbox Row
	
	//=	=Checkbox Row
	$pdf->Cell(0.20,0.2,'','L',0,'L');
	
	$pdf->Cell(0.15,0.15, $_POST['34-Newly_Mastered_Skills_and_Competencies_(Direct_Result_of_Service):_Communication_Skills_Oral_and_Written'] ? 'X' : ' ',1,0,'C');
	
	$pdf->Cell(0.2,0.2,'',0,0,'L');
	
	$pdf->Cell(2.0,0.2,'Communication Skills',0,0,'L');
	
	$pdf->Cell(0.15,0.15, $_POST['35-Newly_Mastered_Skills_and_Competencies_(Direct_Result_of_Service):_Intrinsic_Motivation'] ? 'X' : ' ',1,0,'C');
	
	$pdf->Cell(0.2,0.2,'',0,0,'L');
	
	$pdf->Cell(2.0,0.2,'Intrinsic Motivation',0,0,'L');
	
	$pdf->Cell(0.15,0.15, $_POST['36-Newly_Mastered_Skills_and_Competencies_(Direct_Result_of_Service):_Setting_Goals'] ? 'X' : ' ',1,0,'C');
	
	$pdf->Cell(0.2,0.2,'',0,0,'L');
	
	$pdf->Cell(1.75,0.2,'Setting Goals',0,0,'L');
	
	$pdf->Cell(7.0,0.2,'','LR',1,'L');
	
	//=	=End Checkbox Row
	
	//=	=Second line of text for above row
	$pdf->Cell(0.55,0.2,'','L',0,'L');
	
	$pdf->Cell(6.45,0.2,'Oral and written',0,0,'L');
	
	$pdf->Cell(7.0,0.2,'','LR',1,'L');
	
	//=	=End second line of text
	
	//=	=Checkbox Row
	$pdf->Cell(0.20,0.2,'','L',0,'L');
	
	$pdf->Cell(0.15,0.15, $_POST['37-Newly_Mastered_Skills_and_Competencies_(Direct_Result_of_Service):_Disability_Understanding'] ? 'X' : ' ',1,0,'C');
	
	$pdf->Cell(0.2,0.2,'',0,0,'L');
	
	$pdf->Cell(2.0,0.2,'Disability Understanding',0,0,'L');
	
	$pdf->Cell(0.15,0.15, $_POST['38-Newly_Mastered_Skills_and_Competencies_(Direct_Result_of_Service):_Self-determination'] ? 'X' : ' ',1,0,'C');
	
	$pdf->Cell(0.2,0.2,'',0,0,'L');
	
	$pdf->Cell(2.0,0.2,'Self-determination',0,0,'L');
	
	$pdf->Cell(0.15,0.15, $_POST['39-Newly_Mastered_Skills_and_Competencies_(Direct_Result_of_Service):_Positive_Self-talk'] ? 'X' : ' ',1,0,'C');
	
	$pdf->Cell(0.2,0.2,'',0,0,'L');
	
	$pdf->Cell(1.75,0.2,'Positive Self-talk',0,0,'L');
	
	$pdf->Cell(7.0,0.2,'','LR',1,'L');
	
	//=	=End Checkbox Row
	
	//=	=Checkbox Row
	$pdf->Cell(0.20,0.2,'','L',0,'L');
	
	$pdf->Cell(0.15,0.15, $_POST['40-Newly_Mastered_Skills_and_Competencies_(Direct_Result_of_Service):_Career_and_Employment_Exploration'] ? 'X' : ' ',1,0,'C');
	
	$pdf->Cell(0.2,0.2,'',0,0,'L');
	
	$pdf->Cell(2.0,0.2,'Career and Employment',0,0,'L');
	
	$pdf->Cell(0.15,0.15, $_POST['41-Newly_Mastered_Skills_and_Competencies_(Direct_Result_of_Service):_How_to_Accept_Help'] ? 'X' : ' ',1,0,'C');
	
	$pdf->Cell(0.2,0.2,'',0,0,'L');
	
	$pdf->Cell(2.0,0.2,'How to Accept Help',0,0,'L');
	
	$pdf->Cell(0.15,0.15, $_POST['42-Newly_Mastered_Skills_and_Competencies_(Direct_Result_of_Service):_Decision_Making'] ? 'X' : ' ',1,0,'C');
	
	$pdf->Cell(0.2,0.2,'',0,0,'L');
	
	$pdf->Cell(1.75,0.2,'Decision Making',0,0,'L');
	
	$pdf->Cell(7.0,0.2,'','LR',1,'L');
	
	//=	=End Checkbox Row
	
	//=	=Second line of text for above row
	$pdf->Cell(0.55,0.2,'','L',0,'L');
	
	$pdf->Cell(6.45,0.2,'Exploration',0,0,'L');
	
	$pdf->Cell(7.0,0.2,'','LR',1,'L');
	
	//=	=End second line of text
	
	//=	=Checkbox Row
	$pdf->Cell(0.20,0.2,'','L',0,'L');
	
	$pdf->Cell(0.15,0.15, $_POST['43-Newly_Mastered_Skills_and_Competencies_(Direct_Result_of_Service):_Awareness_of_Individualized_Accommodations'] ? 'X' : ' ',1,0,'C');
	
	$pdf->Cell(0.2,0.2,'',0,0,'L');
	
	$pdf->Cell(2.0,0.2,'Awareness of Individualized',0,0,'L');
	
	$pdf->Cell(0.15,0.15, $_POST['44-Newly_Mastered_Skills_and_Competencies_(Direct_Result_of_Service):_Knowledge_of_Rights_and_Responsibilities'] ? 'X' : ' ',1,0,'C');
	
	$pdf->Cell(0.2,0.2,'',0,0,'L');
	
	$pdf->Cell(2.0,0.2,'Knowledge of Rights and',0,0,'L');
	
	$pdf->Cell(0.15,0.15, $_POST['45-Newly_Mastered_Skills_and_Competencies_(Direct_Result_of_Service):_Request_and_Utilize_Accommodations'] ? 'X' : ' ',1,0,'C');
	
	$pdf->Cell(0.2,0.2,'',0,0,'L');
	
	$pdf->Cell(1.75,0.2,'Request and Utilize',0,0,'L');
	
	$pdf->Cell(7.0,0.2,'','LR',1,'L');
	
	//=	=End Checkbox Row
	
	//=	=Second line of text for above row
	$pdf->Cell(0.55,0.2,'','L',0,'L');
	
	$pdf->Cell(6.45,0.2,'Accommodations                            Responsibilities                              Accommodations',0,0,'L');
	
	$pdf->Cell(7.0,0.2,'','LR',1,'L');
	
	//=	=End second line of text
	
	$pdf->Cell(7.0,0.2,'','LR',1,'L');
	
	$pdf->Cell(7.0,0.2,"Leadership Skills to Develop Self-advocacy Skills, defined as:",'LR',1,'L');
	
	$pdf->Cell(7.0,0.2,'','LR',1,'L');
	
	$pdf->SetFont('Arial','',11);
	
	
	//=	=Checkbox Row
	$pdf->Cell(0.20,0.2,'','L',0,'L');
	
	$pdf->Cell(0.15,0.15, $_POST['46-Newly_Mastered_Skills_and_Competencies_(Direct_Result_of_Service):_Leadership_Skills_to_Develop_Self-advocacy_Skills,_defined_as:_Making_decisions'] ? 'X' : ' ',1,0,'C');
	
	$pdf->Cell(0.2,0.2,'',0,0,'L');
	
	$pdf->Cell(2.0,0.2,'Making Decisions',0,0,'L');
	
	$pdf->Cell(0.15,0.15, $_POST['47-Newly_Mastered_Skills_and_Competencies_(Direct_Result_of_Service):_Leadership_Skills_to_Develop_Self-advocacy_Skills,_defined_as:_Problem_Solving'] ? 'X' : ' ',1,0,'C');
	
	$pdf->Cell(0.2,0.2,'',0,0,'L');
	
	$pdf->Cell(2.0,0.2,'Problem Solving',0,0,'L');
	
	$pdf->Cell(0.15,0.15, $_POST['48-Newly_Mastered_Skills_and_Competencies_(Direct_Result_of_Service):_Leadership_Skills_to_Develop_Self-advocacy_Skills,_defined_as:_Identifying_Supports'] ? 'X' : ' ',1,0,'C');
	
	$pdf->Cell(0.2,0.2,'',0,0,'L');
	
	$pdf->Cell(1.75,0.2,'Identifying Supports',0,0,'L');
	
	$pdf->Cell(7.0,0.2,'','LR',1,'L');
	
	//=	=End Checkbox Row
	
	//=	=Checkbox Row
	$pdf->Cell(0.20,0.2,'','L',0,'L');
	
	$pdf->Cell(0.15,0.15, $_POST['49-Newly_Mastered_Skills_and_Competencies_(Direct_Result_of_Service):_Leadership_Skills_to_Develop_Self-advocacy_Skills,_defined_as:_Learning_about_Self-determination'] ? 'X' : ' ',1,0,'C');
	
	$pdf->Cell(0.2,0.2,'',0,0,'L');
	
	$pdf->Cell(2.0,0.2,'Learning about',0,0,'L');
	
	$pdf->Cell(0.15,0.15, $_POST['50-Newly_Mastered_Skills_and_Competencies_(Direct_Result_of_Service):_Leadership_Skills_to_Develop_Self-advocacy_Skills,_defined_as:_Reaching_Out_to_Others_When_You_Need_Help_and_Friendship'] ? 'X' : ' ',1,0,'C');
	
	$pdf->Cell(0.2,0.2,'',0,0,'L');
	
	$pdf->Cell(4.1,0.2,'Reaching Out to Others',0,0,'L');
	
	$pdf->Cell(7.0,0.2,'','LR',1,'L');
	
	//=	=End Checkbox Row
	
	//=	=Second line of text for above row
	$pdf->Cell(0.55,0.2,'','L',0,'L');
	
	$pdf->Cell(6.45,0.2,'Self-determination                          When You Need Help and Friendship',0,0,'L');
	
	$pdf->Cell(7.0,0.2,'','LR',1,'L');
	
	//=	=End second line of text
	
	//=	=Checkbox Row
	$pdf->Cell(0.20,0.2,'','L',0,'L');
	
	$pdf->Cell(0.15,0.15, $_POST['51-Newly_Mastered_Skills_and_Competencies_(Direct_Result_of_Service):_Leadership_Skills_to_Develop_Self-advocacy_Skills,_defined_as:_Learning_How_to_Speak_Up_for_Oneself'] ? 'X' : ' ',1,0,'C');
	
	$pdf->Cell(0.2,0.2,'',0,0,'L');
	
	$pdf->Cell(2.0,0.2,'Learning How to',0,0,'L');
	
	$pdf->Cell(0.15,0.15, $_POST['52-Newly_Mastered_Skills_and_Competencies_(Direct_Result_of_Service):_Leadership_Skills_to_Develop_Self-advocacy_Skills,_defined_as:_Learning_How_to_Get_Information_so_That_You_can_Understand_Things_that_are_of_Interest'] ? 'X' : ' ',1,0,'C');
	
	$pdf->Cell(0.2,0.2,'',0,0,'L');
	
	$pdf->Cell(4.1,0.2,'Learning How to Get Information so That You',0,0,'L');
	
	$pdf->Cell(7.0,0.2,'','LR',1,'L');
	
	//=	=End Checkbox Row
	
	//=	=Second line of text for above row
	$pdf->Cell(0.55,0.2,'','L',0,'L');
	
	$pdf->Cell(6.45,0.2,'Speak up for Oneself                      can Understand Things that are of Interest',0,0,'L');
	
	$pdf->Cell(7.0,0.2,'','LR',1,'L');
	
	//=	=End second line of text
	
	//=	=Checkbox Row
	$pdf->Cell(0.20,0.2,'','L',0,'L');
	
	$pdf->Cell(1.15,0.2,'',0,0,'L');
	
	$pdf->Cell(0.2,0.2,'',0,0,'L');
	
	$pdf->Cell(1.0,0.2,'',0,0,'L');
	
	$pdf->Cell(0.15,0.15, $_POST['53-Newly_Mastered_Skills_and_Competencies_(Direct_Result_of_Service):_Leadership_Skills_to_Develop_Self-advocacy_Skills,_defined_as:_Employment_Rights_Under_Title_I_of_ADA'] ? 'X' : ' ',1,0,'C');
	
	$pdf->Cell(0.2,0.2,'',0,0,'L');
	
	$pdf->Cell(4.10,0.2,'Employment Rights Under Title I of ADA',0,0,'L');
	
	$pdf->Cell(7.0,0.2,'','LR',1,'L');
	
	//=	=End Checkbox Row
	
	$pdf->SetFont('Arial','',11);
	
	$pdf->Cell(7.0,0.2,"Has the participant actively demonstrated increased competency in the above areas?",'LR',1,'L');
	
	$pdf->SetFont('Arial','',11);
	
	$pdf->Cell(7.0,0.2,'','LR',1,'C');
	
	
	$pdf->Cell(1.10,0.20, '', 'L', 0, 'C');
	
	$pdf->Cell(0.15,0.15, $_POST['54-Has_participant_actively_demonstrated_increased_competency_in_above_areas:_Yes'] ? 'X' : ' ',1,0,'C' );
	
	$pdf->Cell(0.25,0.20, '', 0, 0, 'C');
	
	$pdf->Cell(0.50,0.2,'Yes', 0,0,'L');
	
	
	$pdf->Cell(0.60,0.20, '', 0, 0, 'C');
	
	$pdf->Cell(0.15,0.15, $_POST['55-Has_participant_actively_demonstrated_increased_competency_in_above_areas:_No'] ? 'X' : ' ',1,0,'C' );
	
	$pdf->Cell(0.25,0.20, '', 0, 0, 'C');
	
	$pdf->Cell(4.0,0.2,'No','R',1,'L');
	
	
	$pdf->Cell(7.0,0.2,"Please explain:",'LR',1,'L');
	
	$pdf->MultiCell(7.0,0.2, $_POST['56-Has_participant_actively_demonstrated_increased_competency_in_above_areas:_Please_explain'],'LR','j', 0);
	
	$pdf->Cell(7.0,0.2,'','LR',1,'C');
	
	
	$pdf->Cell(7.0,0.2,'','LBR',1,'C');
	
	
	// 	Start of FOOTER-1 Area
	$pdf->Ln();
	
	
	$pdf->SetFont('Arial','B',12);
	
	$pdf->Cell(1.0,0.2,'Completed By: ', 0, 1, 'L');
	
	$pdf->SetFont('Arial','',11);
	
	$pdf->Ln();
	
	
	$pdf->Cell(4.0,0.2,'', 'B', 0, 'L');
	$pdf->Cell(0.5,0.2,'', 0, 0, 'C');
	$pdf->Cell(2.5,0.2,$_POST['57-Signature_Date'], 'B', 1, 'L');
	
	$pdf->Cell(4.0,0.2,'Qualified Staff Signature', 0, 0, 'L');
	$pdf->Cell(0.5,0.2,'', 0, 0, 'C');
	$pdf->Cell(2.5,0.2,'Date', 0, 1, 'L');
	
	$pdf->Ln();
	
	
	$pdf->Cell(4.0,0.2,$_POST['58-Printed_Name*'], 'B', 0, 'L');
	$pdf->Cell(0.5,0.2,'', 0, 0, 'C');
	$pdf->Cell(2.5,0.2,$_POST['59-Title*'], 'B', 1, 'L');
	
	$pdf->Cell(4.0,0.2,'Printed Name', 0, 0, 'L');
	$pdf->Cell(0.5,0.2,'', 0, 0, 'C');
	$pdf->Cell(2.5,0.2,'Title', 0, 1, 'L');
	
	$pdf->Ln();
	
	$pdf->Cell(1.25,0.2,'Phone Number:', 0, 0, 'L');
	
	$pdf->Cell(2.75,0.2,$_POST['60-Phone_Number*'], 0, 0, 'L');
	
	$pdf->Cell(0.50,0.2,'', 0, 0, 'C');
	
	$pdf->Cell(0.50,0.2,'Email:', 0, 0, 'L');
	
	$pdf->Cell(2.00,0.2,$_POST['61-Email*'], 0, 1, 'L');
	
	$pdf->Ln();
	
	$pdf->Ln();
	
	//=	=========================
	$pdf->Output('report.pdf', 'I');
	
}

function renderForm_125X126X($data) {
	
	$pdf = new FPDF('P', 'in', 'Letter');

	$pdf->SetCreator('CEO, Inc.');
	
	$pdf->SetAuthor('CEO, Inc.');
	
	$pdf->SetTitle('Report');
	
	//=	=========================
	$pdf->AddPage('P','Letter');
	
	$pdf->SetFillColor(200,200,200);
	
	$pdf->SetMargins(0.75,0.25,0.75);
	
	
	$pdf->Image(ACCESLOGO,3.75,0.25,1.0,1.0);
	
	$pdf->Ln(0.85);
	
	
	$pdf->SetFont('Arial','B',10);
	
	$pdf->Cell(7.0,0.2,'VR-125X/126X',0,0,'C');
	
	$pdf->Ln();
	
	$pdf->Ln();
	
	
	$pdf->SetFont('Arial', 'B', 14);
	
	$pdf->Cell(7.0,0.2,'Job Preparation Services',0,0,'C');
	
	$pdf->Ln(0.3);
	
	$pdf->Ln(0.3);
	
	
	$pdf->SetFont('Arial', 'B', 12);
	
	
	$pdf->Cell(0.5,0.2,'',0,0,'L');
	
	
	$pdf->Cell(0.20,0.2,$_POST['1-125X-Work_Readiness_1_Soft_Skills_Training'] ? 'X' : ' ',1,0,'L');
	
	
	$pdf->Cell(0.05,0.2,'',0,0,'L');
	
	
	$pdf->Cell(6.25,0.2,'125X-Work Readiness 1 Soft Skills Training',0,1,'L');
	
	
	$pdf->Ln(0.1);
	
	
	
	$pdf->Cell(0.5,0.2,'',0,0,'L');
	
	
	$pdf->Cell(0.20,0.2,$_POST['2-126X-Work_Readiness_1_Soft_Skills_Training-Deaf_Services'] ? 'X' : ' ',1,0,'L');
	
	
	$pdf->Cell(0.05,0.2,'',0,0,'L');
	
	
	$pdf->Cell(6.25,0.2,'126X-Work Readiness 1 Soft Skills Training- Deaf Services',0,1,'L');
	
	
	$pdf->Ln(0.1);
	
	
	// 	The section below COMMON-1 is on all documents
	
	$pdf->SetFont('Arial', '', 10);
	
	$pdf->Cell(1.75,0.2,'','',0,'L');
	
	$pdf->Cell(1.25,0.2,'AV#:', 'LTB', 0, 'L');
	
	$pdf->Cell(0.75,0.2,'(7 digits)','TB', 0, 'L');
	
	$pdf->Cell(1.25,0.2,$_POST['3-AV#*'],'TBR', 1, 'L');
	
	
	$pdf->Cell(1.75,0.2,'','',0,'L');
	
	$pdf->Cell(1.25,0.2,'ACCES-VR ID#:','LTB',0, 'L');
	
	$pdf->Cell(0.75,0.2,'(6 digits)','TB', 0, 'L');
	
	$pdf->Cell(1.25,0.2,$_POST['4-ACCES-VR_ID#*'],'TBR', 1, 'L');
	
	
	$pdf->Cell(1.75,0.2,'','',0,'L');
	
	$pdf->Cell(1.25,0.2,'CAMS ID #:', 'LTB', 0, 'L');
	
	$pdf->Cell(0.75,0.2,'(10 digits)', 'TB', 0,'L');
	
	$pdf->Cell(1.25,0.2,$_POST['5-CAMS_ID#*'], 'TBR', 1,'L');
	
	
	$pdf->Ln();
	
	
	$pdf->SetFont('Arial','',10);
	
	$pdf->Cell(1.2,0.2,'VR District Office:','LT',0,'L');
	
	$pdf->Cell(2.3,0.2,$_POST['6-VR_District_Office*'],'TR',0,'L');
	
	
	$pdf->Cell(1.0,0.2,'Provider:','LT',0,'L');
	
	$pdf->Cell(2.5,0.2,$_POST['8-Provider*'],'TR',0,'L');
	
	$pdf->Ln();
	
	
	$pdf->Cell(1.2,0.2,'VRC Name:','LT',0,'L');
	
	$pdf->Cell(2.3,0.2,$_POST['7-VRC_Name*'],'TR',0,'L');
	
	
	$pdf->Cell(1.5,0.2,'NYS Fiscal System ID:','LTB',0,'L');
	
	$pdf->Cell(2.0,0.2,'1000018463','TRB',0,'L');
	
	$pdf->Ln();
	
	
	$pdf->Cell(3.5,0.2,'','LTBR',0,'L');
	
	$pdf->Cell(1.0,0.2,'Report Date:','LB',0,'L');
	
	$pdf->Cell(2.5,0.2,$_POST['10-Report_Date*'],'BR',0,'L');
	
	$pdf->Ln();
	
	// 	End of COMMON-1 Area
	// 	Start of COMMON-2a Area  slight variations between forms
	
	$pdf->Ln();
	
	
	$pdf->Cell(1.5,0.2,'Participant First Name:','LTB',0,'L');
	
	$pdf->Cell(2.0,0.2,$_POST['11-Participant_First_Name*'],'TBR',0,'L');
	
	$pdf->Cell(1.5,0.2,'Participant Last Name:','LTB',0,'L');
	
	$pdf->Cell(2.0,0.2,$_POST['12-Participant_Last_Name*'],'TBR',0,'L');
	
	$pdf->Ln();
	
	
	$pdf->Cell(2.0,0.2,'Participant Phone Number: ','LTB',0,'L');
	
	$pdf->Cell(5.0,0.2,$_POST['13-Participant_Phone_Number'],'TBR',0,'L');
	
	$pdf->Ln();
	
	
	$pdf->Cell(2.0,0.2,'Participant Email Address: ','LTB',0,'L');
	
	$pdf->Cell(5.0,0.2,$_POST['14-Participant_Email_Address'],'TBR',0,'L');
	
	$pdf->Ln();
	
	
	// 	End of COMMON-2a Area
	
	// 	Start of CONTENT Area                        
	
	$pdf->Ln();
	
	$pdf->Ln();
	
	$pdf->SetFont('Arial','B',11);
	
	$pdf->Cell(3.0,0.2,'Start Date of Service:',0,0,'L');
	
	$pdf->SetFont('Arial','',11);
	
	$pdf->Cell(4.0,0.2,$_POST['15-Start_Date_of_Service*'],0,1,'L');
	
	$pdf->SetFont('Arial','B',11);
	
	$pdf->Cell(3.0,0.2,'End Date of Service:',0,0,'L');
	
	$pdf->SetFont('Arial','',11);
	
	$pdf->Cell(4.0,0.2,$_POST['16-End_Date_of_Service*'],0,1,'L');
	
	$pdf->SetFont('Arial','B',11);
	
	$pdf->Cell(3.1,0.2,'In Case of Drop Out, Last Date of Contact:',0,0,'L');
	
	$pdf->SetFont('Arial','',11);
	
	$pdf->Cell(4.0,0.2,$_POST['17-In_Case_of_Drop_Out,_Last_Date_of_Contact'],0,1,'L');
	
	$pdf->SetFont('Arial','B',11);
	
	$pdf->Cell(3.0,0.2,'Number of Units Utilized:',0,0,'L');
	
	$pdf->SetFont('Arial','',11);
	
	$pdf->Cell(4.0,0.2,$_POST['18-Number_of_Units_Utilized*'],0,1,'L');
	
	$pdf->SetFont('Arial','B',11);
	
	$pdf->Cell(3.0,0.2,'Number of Units Authorized:',0,0,'L');
	
	$pdf->SetFont('Arial','',11);
	
	$pdf->Cell(4.0,0.2,$_POST['19-Number_of_Units_Authorized*'],0,1,'L');
	
	$pdf->Ln();
	
	
	$pdf->SetFont('Arial','B',12);
	
	$pdf->Cell(7.0,0.2,'Was this report completed and submitted within 10 days of the last service?', 0, 1, 'L');
	
	$pdf->SetFont('Arial','',12);
	
	$pdf->Cell(0.50,0.2,'',0,0,'C');
	$pdf->Cell(0.15,0.15,$_POST['20-Was_this_report_completed_and_submitted_within_10_days_of_the_last_service:_Yes'] ? 'X' : ' ',1,0,'C');
	$pdf->Cell(0.35,0.2,'',0,0,'L');
	$pdf->Cell(2.0,0.2,'Yes',0,0,'L');
	
	$pdf->Cell(0.50,0.2,'',0,0,'C');
	$pdf->Cell(0.15,0.15,$_POST['21-Was_this_report_completed_and_submitted_within_10_days_of_the_last_service:_No'] ? 'X' : ' ',1,0,'C');
	$pdf->Cell(0.35,0.2,'',0,0,'L');
	$pdf->Cell(2.0,0.2,'No',0,1,'L');
	
	$pdf->Cell(1.6,0.2,'If no, please explain:',0,0,'C');
	
	$pdf->MultiCell(6.50,0.2,$_POST['22-If_no,_please_explain'], 0, 'J', 0);
	
	
	$pdf->Ln();
	
	
	$p1 = 'Workplace readiness training to develop social skills and independent living is based on a pre-approved detailed Syllabus/Activity Plan. The Syllabus/Activity Plan must be approved by the ACCES-VR District Office(s) utilizing the service.';
	
	$p2 = "participant and the individual's progress (rating 1-4) acquiring soft skills and independent living.";
	
	$p3 = "aspects of work exceed grade level expectations and show exemplary performance or understanding.";
	
	$p4 = "indicate some aspects of skill that exceed expectations and demonstrate solid perfomance or understanding.";
	
	$p5 = "competencies acceptable expectations.  Performance and understanding are emerging or developing but there are some errors and mastery is not thorough.";
	
	$p6 = "adequate for expectations and indicates that the student has serious need for skill development and improvement.";
	
	
	$pdf->SetFont('Arial','',12);
	
	$pdf->MultiCell(7.0,0.2,$p1,0,'J', 0);
	
	$pdf->Ln();
	
	
	$pdf->SetFont('Arial','B',12);
	
	$pdf->Cell(4.0,0.2,'Describe the Services Provided to the Participant:',0,1,'C');
	
	$pdf->SetFont('Arial','',12);
	
	$pdf->MultiCell(6.50,0.2,$_POST['23-Describe_the_Services_Provided_to_the_Participant*'], 0, 'J', 0);
	
	
	$pdf->Ln();
	
	
	$pdf->SetFont('Arial','BU',12);
	
	$pdf->Cell(7.0,0.2,"List Skill and Provide Progress Rating:", 0, 1, 'L');
	
	$pdf->Ln();
	
	
	$pdf->SetFont('Arial','B',12);
	
	$pdf->Cell(7.0,0.2,"Rating Scale:", 0, 1, 'L');
	
	$pdf->SetFont('Arial','',12);
	
	
	$pdf->Cell(0.75,0.2,chr(183),0,0,'C');
	
	$pdf->Cell(1.05,0.2,"Level 4 is the ", 0, 0, 'L');
	
	$pdf->SetFont('Arial','B',12);
	
	$pdf->Cell(1.9,0.2,"Standard of excellence", 0, 0, 'L');
	
	$pdf->SetFont('Arial','',12);
	
	$pdf->Cell(1.0,0.2,"level. Descriptions should indicate that all", 0, 1, 'L');
	
	$pdf->Cell(0.75,0.2,'',0,0,'C');
	
	$pdf->MultiCell(6.25,0.2,$p3,0,'J', 0);
	
	$pdf->Ln();
	
	
	$pdf->Cell(0.75,0.2,chr(183),0,0,'C');
	
	$pdf->Cell(1.05,0.2,"Level 3 is the ", 0, 0, 'L');
	
	$pdf->SetFont('Arial','B',12);
	
	$pdf->Cell(2.9,0.2,"Approaching standard of excellence", 0, 0, 'L');
	
	$pdf->SetFont('Arial','',12);
	
	$pdf->Cell(1.0,0.2,"level. Descriptions should", 0, 1, 'L');
	
	$pdf->Cell(0.75,0.2,'',0,0,'C');
	
	
	$pdf->MultiCell(6.25,0.2,$p4,0,'J', 0);
	
	$pdf->Ln();
	
	
	$pdf->Cell(0.75,0.2,chr(183),0,0,'C');
	
	$pdf->Cell(1.05,0.2,"Level 2 is the ", 0, 0, 'L');
	
	$pdf->SetFont('Arial','B',12);
	
	$pdf->Cell(2.25,0.2,"Meets acceptable standard.", 0, 0, 'L');
	
	$pdf->SetFont('Arial','',12);
	
	$pdf->Cell(1.0,0.2,"This level should indicate minimal", 0, 1, 'L');
	
	$pdf->Cell(0.75,0.2,'',0,0,'C');
	
	$pdf->MultiCell(6.25,0.2,$p5,0,'J', 0);
	
	$pdf->Ln();
	
	
	$pdf->Cell(0.75,0.2,chr(183),0,0,'C');
	
	$pdf->Cell(0.60,0.2,"Level 1 ", 0, 0, 'L');
	
	$pdf->SetFont('Arial','B',12);
	
	$pdf->Cell(3.25,0.2,"Does not yet meet acceptable standard.", 0, 0, 'L');
	
	$pdf->SetFont('Arial','',12);
	
	$pdf->Cell(1.0,0.2,"This level indicates what is not", 0, 1, 'L');
	
	$pdf->Cell(0.75,0.2,'',0,0,'C');
	
	$pdf->MultiCell(6.25,0.2,$p6,0,'J', 0);
	
	$pdf->Ln();
	
	
	$pdf->SetFont('Arial','UB',12);
	
	$pdf->Cell(3.5,0.2,'List skill:', 0, 0, 'L');
	
	$pdf->Cell(3.5,0.2,'Progress in acquiring skills Rating (1-4):', 0, 0, 'L');
	
	$pdf->SetFont('Arial','',12);
	
	$pdf->Ln();
	
	
	$pdf->Cell(0.5,0.2,'1)',0,0,'L');
	
	$pdf->Cell(3.0,0.2,$_POST['24-List_Skill_#1'],0,0,'L');
	
	$pdf->Cell(0.5,0.2,'1)',0,0,'L');
	
	$pdf->Cell(3.0,0.2,$_POST['25-Progress_in_acquiring_skill_Rating_(1-4):_#1'],0,1,'L');
	
	
	$pdf->Cell(0.5,0.2,'2)',0,0,'L');
	
	$pdf->Cell(3.0,0.2,$_POST['26-List_Skill_#2'],0,0,'L');
	
	$pdf->Cell(0.5,0.2,'2)',0,0,'L');
	
	$pdf->Cell(3.0,0.2,$_POST['27-Progress_in_acquiring_skill_Rating_(1-4):_#2'],0,1,'L');
	
	
	$pdf->Cell(0.5,0.2,'3)',0,0,'L');
	
	$pdf->Cell(3.0,0.2,$_POST['28-List_Skill_#3'],0,0,'L');
	
	$pdf->Cell(0.5,0.2,'3)',0,0,'L');
	
	$pdf->Cell(3.0,0.2,$_POST['29-Progress_in_acquiring_skill_Rating_(1-4):_#3'],0,1,'L');
	
	
	$pdf->Cell(0.5,0.2,'4)',0,0,'L');
	
	$pdf->Cell(3.0,0.2,$_POST['30-List_Skill_#4'],0,0,'L');
	
	$pdf->Cell(0.5,0.2,'4)',0,0,'L');
	
	$pdf->Cell(3.0,0.2,$_POST['31-Progress_in_acquiring_skill_Rating_(1-4):_#4'],0,1,'L');
	
	
	$pdf->Cell(0.5,0.2,'5)',0,0,'L');
	
	$pdf->Cell(3.0,0.2,$_POST['32-List_Skill_#5'],0,0,'L');
	
	$pdf->Cell(0.5,0.2,'5)',0,0,'L');
	
	$pdf->Cell(3.0,0.2,$_POST['33-Progress_in_acquiring_skill_Rating_(1-4):_#5'],0,1,'L');
	
	
	$pdf->Cell(0.5,0.2,'6)',0,0,'L');
	
	$pdf->Cell(3.0,0.2,$_POST['34-List_Skill_#6'],0,0,'L');
	
	$pdf->Cell(0.5,0.2,'6)',0,0,'L');
	
	$pdf->Cell(3.0,0.2,$_POST['35-Progress_in_acquiring_skill_Rating_(1-4):_#6'],0,1,'L');
	
	
	$pdf->Cell(0.5,0.2,'7)',0,0,'L');
	
	$pdf->Cell(3.0,0.2,$_POST['36-List_Skill_#7'],0,0,'L');
	
	$pdf->Cell(0.5,0.2,'7)',0,0,'L');
	
	$pdf->Cell(3.0,0.2,$_POST['37-Progress_in_acquiring_skill_Rating_(1-4):_#7'],0,1,'L');
	
	
	$pdf->Cell(0.5,0.2,'8)',0,0,'L');
	
	$pdf->Cell(3.0,0.2,$_POST['38-List_Skill_#8'],0,0,'L');
	
	$pdf->Cell(0.5,0.2,'8)',0,0,'L');
	
	$pdf->Cell(3.0,0.2,$_POST['39-Progress_in_acquiring_skill_Rating_(1-4):_#8'],0,1,'L');
	
	
	$pdf->Cell(0.5,0.2,'9)',0,0,'L');
	
	$pdf->Cell(3.0,0.2,$_POST['40-List_Skill_#9'],0,0,'L');
	
	$pdf->Cell(0.5,0.2,'9)',0,0,'L');
	
	$pdf->Cell(3.0,0.2,$_POST['41-Progress_in_acquiring_skill_Rating_(1-4):_#9'],0,1,'L');
	
	
	$pdf->Cell(0.5,0.2,'10)',0,0,'L');
	
	$pdf->Cell(3.0,0.2,$_POST['42-List_Skill_#10'],0,0,'L');
	
	$pdf->Cell(0.5,0.2,'10)',0,0,'L');
	
	$pdf->Cell(3.0,0.2,$_POST['43-Progress_in_acquiring_skill_Rating_(1-4):_#10'],0,1,'L');
	
	
	$pdf->Ln();
	
	$pdf->SetFont('Arial','UB',12);
	
	$pdf->Cell(5.5,0.2,'Newly mastered skills and competencies developed in individual because of service.', 0, 1, 'L');
	
	$pdf->SetFont('Arial','B',12);
	
	$pdf->Cell(7.0,0.2,'Please check all that apply.', 0, 1, 'L');
	
	$pdf->Ln();
	
	
	$pdf->SetFont('Arial','',11);
	
	
	$pdf->Cell(0.15,0.15,$_POST['44-Newly_mastered_skills_and_competencies_developed_in_individual_because_of_service:_Independent_Living_Skills'] ? 'X' : ' ',1,0,'C');
	$pdf->Cell(0.35,0.2,'',0,0,'C');
	
	$pdf->Cell(3.0,0.2,'Independent Living Skills',0,0,'L');
	
	
	$pdf->Cell(0.15,0.15,$_POST['45-Newly_mastered_skills_and_competencies_developed_in_individual_because_of_service:_Social/Interpersonal_Skills'] ? 'X' : ' ',1,0,'C');
	$pdf->Cell(0.35,0.2,'',0,0,'C');
	
	$pdf->Cell(3.0,0.2,'Social/Interpersonal Skills',0,1,'L');
	
	
	$pdf->Cell(0.15,0.15,$_POST['46-Newly_mastered_skills_and_competencies_developed_in_individual_because_of_service:_Financial_Literacy'] ? 'X' : ' ',1,0,'C');
	$pdf->Cell(0.35,0.2,'',0,0,'C');
	
	$pdf->Cell(3.0,0.2,'Financial literacy',0,0,'L');
	
	
	$pdf->Cell(0.15,0.15,$_POST['47-Newly_mastered_skills_and_competencies_developed_in_individual_because_of_service:_Orientation_and_Mobility_Skills'] ? 'X' : ' ',1,0,'C');
	$pdf->Cell(0.35,0.2,'',0,0,'C');
	
	$pdf->Cell(3.0,0.2,'Orientation and mobility skills',0,1,'L');
	
	
	$pdf->Cell(0.15,0.15,$_POST['48-Newly_mastered_skills_and_competencies_developed_in_individual_because_of_service:_Job-Seeking_Skills'] ? 'X' : ' ',1,0,'C');
	$pdf->Cell(0.35,0.2,'',0,0,'C');
	
	$pdf->Cell(3.0,0.2,'Job-seeking skills',0,0,'L');
	
	
	$pdf->Cell(0.15,0.15,$_POST['49-Newly_mastered_skills_and_competencies_developed_in_individual_because_of_service:_Understanding_employer_expectations_for_punctuality_and_performance'] ? 'X' : ' ',1,0,'C');
	$pdf->Cell(0.35,0.2,'',0,0,'C');
	
	$pdf->Cell(3.0,0.2,'Understanding employer expectations for',0,1,'L');
	
	
	$pdf->Cell(0.2,0.2,'',0,0,'C');
	$pdf->Cell(0.3,0.2,'',0,0,'C');
	
	$pdf->Cell(3.0,0.2,'',0,0,'C');
	
	
	$pdf->Cell(0.2,0.2,'',0,0,'C');
	$pdf->Cell(0.3,0.2,'',0,0,'C');
	
	$pdf->Cell(3.0,0.2,'punctuality and performance',0,1,'L');
	
	
	$pdf->Cell(0.15,0.15,$_POST['50-Newly_mastered_skills_and_competencies_developed_in_individual_because_of_service:_Other_soft_skills_necessary_for_employment'] ? 'X' : ' ',1,0,'C');
	$pdf->Cell(0.35,0.2,'',0,0,'C');
	
	$pdf->Cell(3.20,0.2,'Other "soft" skills necessary for employment:',0,0,'L');
	
	$pdf->Cell(4.65,0.2,'', 0, 0, 'L');
	//T	ODO: oskills_txt
	$pdf->SetFont('Arial','',12);
	
	$pdf->Cell(0.20,0.2,'',0,0,'L');
	
	$pdf->MultiCell(5.5,0.2,$_POST['51-If_other,_please_list'],0,'L',0);
	
	
	$pdf->Ln();
	
	$pdf->Ln();
	
	
	$pdf->SetFont('Arial','',12);
	
	$pdf->Cell(7.0,0.2,'Provide a narrative including but not limited to: How has the participant actively', 0, 1, 'L');
	
	$pdf->Cell(7.0,0.2,'demonstrated increased competency in above areas, any concerns, impressions and', 0, 1, 'L');
	
	$pdf->Cell(7.0,0.2,'recommendations for consideration.', 0, 1, 'L');
	
	$pdf->Ln();
	
	$pdf->SetFont('Arial','',12);
	
	$pdf->MultiCell(6.50,0.2,$_POST['52-Provide_a_narrative_including_but_not_limited_to:_How_has_the_participant_actively_demonstrated_increased_competency_in_above_areas,_any_concerns,_impressions_and_recommendations_for_consideration*'], 0, 'J', 0);
	
	
	$pdf->Ln();
	
	
	// 	Start of FOOTER-1 Area
	
	$pdf->SetFont('Arial','B',12);
	
	$pdf->Cell(1.0,0.2,'Completed By: ', 0, 1, 'L');
	
	$pdf->SetFont('Arial','',11);
	
	$pdf->Ln();
	
	
	$pdf->Cell(4.0,0.2,'', 'B', 0, 'L');
	$pdf->Cell(0.5,0.2,'', 0, 0, 'C');
	$pdf->Cell(2.5,0.2,$_POST['54-Signature_Date'], 'B', 1, 'L');
	
	$pdf->Cell(4.0,0.2,'Qualified Staff Signature', 0, 0, 'L');
	$pdf->Cell(0.5,0.2,'', 0, 0, 'C');
	$pdf->Cell(2.5,0.2,'Date', 0, 1, 'L');
	
	$pdf->Ln();
	
	
	$pdf->Cell(4.0,0.2,$_POST['53-Qualified_Staff_Signature*'], 'B', 0, 'L');
	$pdf->Cell(0.5,0.2,'', 0, 0, 'C');
	$pdf->Cell(2.5,0.2,$_POST['54-Title'], 'B', 1, 'L');
	
	$pdf->Cell(4.0,0.2,'Printed Name', 0, 0, 'L');
	$pdf->Cell(0.5,0.2,'', 0, 0, 'C');
	$pdf->Cell(2.5,0.2,'Title', 0, 1, 'L');
	
	$pdf->Ln();
	
	$pdf->Cell(1.25,0.2,'Phone Number:', 0, 0, 'L');
	
	$pdf->Cell(2.75,0.2,$_POST['55-Phone_Number*'], 0, 0, 'L');
	
	$pdf->Cell(0.50,0.2,'', 0, 0, 'C');
	
	$pdf->Cell(0.50,0.2,'Email:', 0, 0, 'L');
	
	$pdf->Cell(2.00,0.2,$_POST['56-Email*'], 0, 1, 'L');
	
	$pdf->Ln();
	
	$pdf->Ln();
	
	
	$pdf->SetFont('Arial','B',12);
	
	$pdf->Cell(1.0,0.2,'Provider Supervisor: ', 0, 1, 'L');
	
	$pdf->SetFont('Arial','',11);
	
	$pdf->Ln();
	
	
	$pdf->Cell(4.0,0.2,'', 'B', 0, 'L');
	$pdf->Cell(0.5,0.2,'', 0, 0, 'C');
	$pdf->Cell(2.5,0.2,$_POST['58-Provider_Supervisor_Signature_Date'], 'B', 1, 'L');
	
	$pdf->Cell(4.0,0.2,'Qualified Staff Signature', 0, 0, 'L');
	$pdf->Cell(0.5,0.2,'', 0, 0, 'C');
	$pdf->Cell(2.5,0.2,'Date', 0, 1, 'L');
	
	$pdf->Ln();
	
	$pdf->Cell(4.0,0.2,$_POST['57-Provider_Supervisor_Printed_Name'], 'B', 0, 'L');
	$pdf->Cell(0.5,0.2,'', 0, 0, 'C');
	$pdf->Cell(2.5,0.2,$_POST['59-Provider_Supervisor_Title'], 'B', 1, 'L');
	
	$pdf->Cell(4.0,0.2,'Printed Name', 0, 0, 'L');
	$pdf->Cell(0.5,0.2,'', 0, 0, 'C');
	$pdf->Cell(2.5,0.2,'Title', 0, 1, 'L');
	
	$pdf->Ln();
	
	// 	End of FOOTER-1 Area
	//=	=========================
	$pdf->Output('report.pdf', 'I');
	
}

function renderForm_MTR() {
	
	$pdf = new FPDF('P', 'in', 'Letter');

	$pdf->SetCreator('CEO, Inc.');
	
	$pdf->SetAuthor('CEO, Inc.');
	
	$pdf->SetTitle('Report');
	
	//=	=========================
	$pdf->AddPage('P', 'Letter');
	
	$pdf->SetMargins(0.5, 0.5, 0.5);
	
	$pdf->SetFont('Times','',12);
	
	$pdf->Cell(0,0.2,'CAREER AND EMPLOYMENT OPTIONS, INC.',0,0,'C');
	
	$pdf->Ln();
	
	$pdf->Cell(0,0.2,'1 Rabro Drive, Suite 102',0,0,'C');
	
	$pdf->Ln();
	
	$pdf->Cell(0,0.2,'Hauppauge, N.Y. 11788',0,0,'C');
	
	$pdf->Ln();
	
	$pdf->Cell(0,0.2,'Phone (631) 234-6064 Fax (631) 234-6081',0,0,'C');
	
	$pdf->Ln();
	
	$pdf->Ln();
	
	$pdf->SetFont('Times','',12);
	
	$pdf->Cell(0,0.2,'MONTHLY TRANSITION SERVICES REPORT',0,0,'C');
	
	$pdf->Ln();
	
	$pdf->Ln();
	
	
	$pdf->SetFont('Times','',10);
	
	$pdf->Cell(0.12,0.2,'',0,0,'L', false);
	
	$pdf->Cell(1,0.2,'STUDENT:',0,0,'L', false);
	
	$pdf->Cell(2,0.2,$_POST['1-Student*'],0,0,'L', false);
	
	$pdf->Cell(2,0.2,'SCHOOL DISTRICT: ',0,0,'L', false);
	
	$pdf->Cell(2,0.2,$_POST['2-School_District*'], 0,0,'L', false);
	
	$pdf->Ln();
	
	
	$pdf->Cell(0.12,0.2,'',0,0,'L', false);
	
	$pdf->Cell(3,0.2,'CAREER CONSULTANT NAME: ',0,0,'L', false);
	
	$pdf->Cell(0,0.2,$_POST['3-Career_Consultant_Name*'],0,0,'L', false);
	
	$pdf->Ln();
	
	
	$pdf->Cell(0.12,0.2,'',0,0,'L', false);
	
	$pdf->Cell(1,0.2,'MONTH/YEAR: ',0,0,'L', false);
	
	$pdf->Cell(0,0.2,$_POST['4-Month/Year*'],0,0,'L', false);
	
	$pdf->Ln();
	
	$pdf->Ln();
	
	
	$pdf->Cell(0,0.2,'IEP GOAL: ','LTR',1,'L', false);
	
	$pdf->MultiCell(0,0.2,$_POST['5-IEP_Goal*'],'LBR','J', false);
	
	
	$pdf->Cell(0,0.2,'OBJECTIVE #1/TARGET DATE: ','LTR',1,'L', false);
	
	$pdf->MultiCell(0,0.2,$_POST['6-Objective_#1/Target_Date*'],'LBR','J', false);
	
	$pdf->Cell(0,0.2,'INTERVENTIONS/STRATEGIES: ','LTR',1,'L', false);
	
	$pdf->MultiCell(0,0.2,$_POST['7-Objective_#1_Interventions/Strategies*'],'LBR','J', false);
	
	$pdf->Cell(0,0.2,'PROGRESS TOWARD OBJECTIVE/REVIEW DATE: ','LTR',1,'L', false);
	
	$pdf->MultiCell(0,0.2,$_POST['8-Objective_#1_Progress_Toward_Objective/Review_Date*'],'LBR','J', false);
	
	$pdf->Ln();
	
	
	$pdf->Cell(0,0.2,'OBJECTIVE #2/TARGET DATE: ','LTR',1,'L', false);
	
	$pdf->MultiCell(0,0.2,$_POST['9-Objective_#2/Target_Date'],'LBR','J', false);
	
	$pdf->Cell(0,0.2,'INTERVENTIONS/STRATEGIES: ','LTR',1,'L', false);
	
	$pdf->MultiCell(0,0.2,$_POST['10-Objective_#2_Interventions/Strategies'],'LBR','J', false);
	
	$pdf->Cell(0,0.2,'PROGRESS TOWARD OBJECTIVE/REVIEW DATE: ','LTR',1,'L', false);
	
	$pdf->MultiCell(0,0.2,$_POST['11-Objective_#2_Progress_Toward_Objective/Review_Date'],'LBR','J', false);
	
	$pdf->Ln();
	
	
	$pdf->Cell(0,0.2,'OBJECTIVE #3/TARGET DATE: ','LTR',1,'L', false);
	
	$pdf->MultiCell(0,0.2,$_POST['12-Objective_#3/Target_Date'],'LBR','J', false);
	
	$pdf->Cell(0,0.2,'INTERVENTIONS/STRATEGIES: ','LTR',1,'L', false);
	
	$pdf->MultiCell(0,0.2,$_POST['13-Objective_#3_Interventions/Strategies'],'LBR','J', false);
	
	$pdf->Cell(0,0.2,'PROGRESS TOWARD OBJECTIVE/REVIEW DATE: ','LTR',1,'L', false);
	
	$pdf->MultiCell(0,0.2,$_POST['14-Objective_#3_Progress_Toward_Objective/Review_Date'],'LBR','J', false);
	
	$pdf->Ln();
	
	
	$pdf->Cell(0,0.2,'OBJECTIVE #4/TARGET DATE: ','LTR',1,'L', false);
	
	$pdf->MultiCell(0,0.2,$_POST['15-Objective_#4/Target_Date'],'LBR','J', false);
	
	$pdf->Cell(0,0.2,'INTERVENTIONS/STRATEGIES: ','LTR',1,'L', false);
	
	$pdf->MultiCell(0,0.2,$_POST['16-Objective_#4_Interventions/Strategies'],'LBR','J', false);
	
	$pdf->Cell(0,0.2,'PROGRESS TOWARD OBJECTIVE/REVIEW DATE: ','LTR',1,'L', false);
	
	$pdf->MultiCell(0,0.2,$_POST['17-Objective_#4_Progress_Toward_Objective/Review_Date'],'LBR','J', false);
	
	$pdf->Ln();
	
	
	$pdf->Cell(0,0.2,'OBJECTIVE #5/TARGET DATE: ','LTR',1,'L', false);
	
	$pdf->MultiCell(0,0.2,$_POST['18-Objective_#5/Target_Date'],'LBR','J', false);
	
	$pdf->Cell(0,0.2,'INTERVENTIONS/STRATEGIES: ','LTR',1,'L', false);
	
	$pdf->MultiCell(0,0.2,$_POST['19-Objective_#5_Interventions/Strategies'],'LBR','J', false);
	
	$pdf->Cell(0,0.2,'PROGRESS TOWARD OBJECTIVE/REVIEW DATE: ','LTR',1,'L', false);
	
	$pdf->MultiCell(0,0.2,$_POST['20-Objective_#5_Progress_Toward_Objective/Review_Date'],'LBR','J', false);
	
	$pdf->Ln();
	
	
	$pdf->Cell(0,0.2,'OBJECTIVE #6/TARGET DATE: ','LTR',1,'L', false);
	
	$pdf->MultiCell(0,0.2,$_POST['21-Objective_#6/Target_Date'],'LBR','J', false);
	
	$pdf->Cell(0,0.2,'INTERVENTIONS/STRATEGIES: ','LTR',1,'L', false);
	
	$pdf->MultiCell(0,0.2,$_POST['22-Objective_#6_Interventions/Strategies'],'LBR','J', false);
	
	$pdf->Cell(0,0.2,'PROGRESS TOWARD OBJECTIVE/REVIEW DATE: ','LTR',1,'L', false);
	
	$pdf->MultiCell(0,0.2,$_POST['23-Objective_#6_Progress_Toward_Objective/Review_Date'],'LBR','J', false);
	
	$pdf->Ln();
	
	
	$pdf->Cell(0,0.2,'OBJECTIVE #7/TARGET DATE: ','LTR',1,'L', false);
	
	$pdf->MultiCell(0,0.2,$_POST['24-Objective_#7/Target_Date'],'LBR','J', false);
	
	$pdf->Cell(0,0.2,'INTERVENTIONS/STRATEGIES: ','LTR',1,'L', false);
	
	$pdf->MultiCell(0,0.2,$_POST['25-Objective_#7_Interventions/Strategies'],'LBR','J', false);
	
	$pdf->Cell(0,0.2,'PROGRESS TOWARD OBJECTIVE/REVIEW DATE: ','LTR',1,'L', false);
	
	$pdf->MultiCell(0,0.2,$_POST['26-Objective_#7_Progress_Toward_Objective/Review_Date'],'LBR','J', false);
	
	$pdf->Ln();
	
	
	$pdf->Cell(0,0.2,'OBJECTIVE #8/TARGET DATE: ','LTR',1,'L', false);
	
	$pdf->MultiCell(0,0.2,$_POST['27-Objective_#8/Target_Date'],'LBR','J', false);
	
	$pdf->Cell(0,0.2,'INTERVENTIONS/STRATEGIES: ','LTR',1,'L', false);
	
	$pdf->MultiCell(0,0.2,$_POST['28-Objective_#8_Interventions/Strategies'],'LBR','J', false);
	
	$pdf->Cell(0,0.2,'PROGRESS TOWARD OBJECTIVE/REVIEW DATE: ','LTR',1,'L', false);
	
	$pdf->MultiCell(0,0.2,$_POST['29-Objective_#8_Progress_Toward_Objective/Review_Date'],'LBR','J', false);
	
	$pdf->Ln();
	
	$pdf->Ln();
	
	
	$pdf->SetFont('Times','B', 8);
	
	$pdf->Cell(0.12,0.2,'I have reviewed the Monthly Transistion Services Report with the above student.',0,0,'L',false);
	
	$pdf->Ln();
	
	
	$pdf->Ln();
	
	$pdf->Ln();
	
	$pdf->Cell(4,0.2,$_POST['30-Career_Consultant*'],0,0,false);
	
	$pdf->Cell(4,0.2,$_POST['31-Date*'],0,0,false);
	
	$pdf->Ln();
	
	$pdf->Cell(4,0.2,'Career Consultant',0,0,false);
	
	$pdf->Cell(4,0.2,'Date',0,0,false);
	
	
	$pdf->Line( 0.4, $pdf->GetY(), 3.0, $pdf->GetY());
	
	$pdf->Line( 4.4, $pdf->GetY(), 7.0, $pdf->GetY());
	
	
	$pdf->SetX(6.5);
	
	$pdf->SetY(10.0);
	
	$pdf->SetFont('Times','', 6);
	
	//=	=========================
	$pdf->Output('report.pdf', 'I');
	
}

function renderForm_929X935X($data) {
	
	$pdf = new FPDF('P', 'in', 'Letter');

	$pdf->SetCreator('CEO, Inc.');
	
	$pdf->SetAuthor('CEO, Inc.');
	
	$pdf->SetTitle('Report');
	
	//=	=========================
	$pdf->AddPage('P','Letter');
	
	$pdf->SetFillColor(200,200,200);
	
	$pdf->SetMargins(0.75,0.25,0.75);
	
	
	$pdf->Image(ACCESLOGO,3.75,0.25,1.0,1.0);
	
	$pdf->Ln(0.85);
	
	
	$pdf->SetFont('Arial','B',10);
	
	$pdf->Cell(7.0,0.2,'VR-929X/VR-935X',0,0,'C');
	
	$pdf->Ln();
	
	$pdf->Ln();
	
	
	$pdf->SetFont('Arial', 'B', 14);
	
	$pdf->Cell(7.0,0.2,'Job Placement Services',0,0,'C');
	
	$pdf->Ln(0.3);

	$pdf->SetFont('Arial', 'B', 10);
	
	$pdf->Cell(7.0,0.2,'Direct Placement Plan',0,0,'C');
	
	$pdf->Ln(0.3);
	
	
	$pdf->SetFont('Arial', 'B', 12);
	
	
	$pdf->Cell(0.5,0.2,'',0,0,'L');
	
	
	$pdf->Cell(0.20,0.2,$_POST['1-929X-Job_Seeking_and_Development_Services'] ? 'X' : ' ',1,0,'L');
	
	
	$pdf->Cell(0.05,0.2,'',0,0,'L');
	
	
	$pdf->Cell(6.25,0.2,'929X-Job Seeking and Development Services',0,1,'L');
	
	
	$pdf->Ln(0.1);
	
	
	
	$pdf->Cell(0.5,0.2,'',0,0,'L');
	
	
	$pdf->Cell(0.20,0.2,$_POST['2-935X-Job_Seeking_and_Development_Services_(Deaf_Service)'] ? 'X' : ' ',1,0,'L');
	
	
	$pdf->Cell(0.05,0.2,'',0,0,'L');
	
	
	$pdf->Cell(6.25,0.2,'935X-Job Seeking and Development Services (Deaf Service)',0,1,'L');
	
	
	$pdf->Ln(0.1);
	
	
	// 	The section below COMMON-1 is on all documents
	
	$pdf->SetFont('Arial', '', 10);
	
	$pdf->Cell(1.75,0.2,'','',0,'L');
	
	$pdf->Cell(1.25,0.2,'AV#:', 'LTB', 0, 'L');
	
	$pdf->Cell(0.75,0.2,'(7 digits)','TB', 0, 'L');
	
	$pdf->Cell(1.25,0.2,$_POST['3-AV#*'],'TBR', 1, 'L');
	
	
	$pdf->Cell(1.75,0.2,'','',0,'L');
	
	$pdf->Cell(1.25,0.2,'ACCES-VR ID#:','LTB',0, 'L');
	
	$pdf->Cell(0.75,0.2,'(6 digits)','TB', 0, 'L');
	
	$pdf->Cell(1.25,0.2,$_POST['4-ACCES-VR_ID#*'],'TBR', 1, 'L');
	
	
	$pdf->Cell(1.75,0.2,'','',0,'L');
	
	$pdf->Cell(1.25,0.2,'CAMS ID #:', 'LTB', 0, 'L');
	
	$pdf->Cell(0.75,0.2,'(10 digits)', 'TB', 0,'L');
	
	$pdf->Cell(1.25,0.2,$_POST['5-CAMS_ID#*'], 'TBR', 1,'L');
	
	
	$pdf->Ln();
	
	
	$pdf->SetFont('Arial','',10);
	
	$pdf->Cell(1.2,0.2,'VR District Office:','LT',0,'L');
	
	$pdf->Cell(2.3,0.2,$_POST['6-VR_District_Office*'],'TR',0,'L');
	
	
	$pdf->Cell(1.0,0.2,'Provider:','LT',0,'L');
	
	$pdf->Cell(2.5,0.2,$_POST['8-Provider*'],'TR',0,'L');
	
	$pdf->Ln();
	
	
	$pdf->Cell(1.2,0.2,'VRC Name:','LT',0,'L');
	
	$pdf->Cell(2.3,0.2,$_POST['7-VRC_Name*'],'TR',0,'L');
	
	
	$pdf->Cell(1.5,0.2,'NYS Fiscal System ID:','LTB',0,'L');
	
	$pdf->Cell(2.0,0.2,'1000018463','TRB',0,'L');
	
	$pdf->Ln();
	
	
	$pdf->Cell(3.5,0.2,'','LTBR',0,'L');
	
	$pdf->Cell(1.0,0.2,'Report Date:','LB',0,'L');
	
	$pdf->Cell(2.5,0.2,$_POST['10-Report_Date*'],'BR',0,'L');
	
	$pdf->Ln();
	
	// 	End of COMMON-1 Area
	// 	Start of COMMON-2a Area  slight variations between forms
	
	$pdf->Ln();
	
	
	$pdf->Cell(1.5,0.2,'Participant First Name:','LTB',0,'L');
	
	$pdf->Cell(2.0,0.2,$_POST['11-Participant_First_Name*'],'TBR',0,'L');
	
	$pdf->Cell(1.5,0.2,'Participant Last Name:','LTB',0,'L');
	
	$pdf->Cell(2.0,0.2,$_POST['12-Participant_Last_Name*'],'TBR',0,'L');
	
	$pdf->Ln();
	
	
	$pdf->Cell(2.0,0.2,'Participant Phone Number: ','LTB',0,'L');
	
	$pdf->Cell(5.0,0.2,$_POST['13-Participant_Phone_Number'],'TBR',0,'L');
	
	$pdf->Ln();
	
	
	$pdf->Cell(2.0,0.2,'Participant Email Address: ','LTB',0,'L');
	
	$pdf->Cell(5.0,0.2,$_POST['14-Participant_Email_Address'],'TBR',0,'L');
	
	$pdf->Ln();
	
	
	// 	End of COMMON-2a Area
	
	// 	Start of CONTENT Area                        
	
	$pdf->Ln();
	
	$pdf->Ln();
	
	$pdf->SetFont('Arial','B',12);
	
	$pdf->Cell(3.0,0.2,'Vocational Goal:',0,1,'L');
	
	$pdf->SetFont('Arial','',12);
	
	$pdf->MultiCell(4.0,0.2,$_POST['15-Vocational_Goal*'],'','J',0);
	
	$pdf->SetFont('Arial','B',12);
	
	$pdf->Cell(3.0,0.2,'Barriers to Employment: ',0,1,'L');
	
	$pdf->SetFont('Arial','',12);
	
	$pdf->MultiCell(4.0,0.2,$_POST['16-Barriers_to_Employment*'],'','J',0);

	$pdf->Ln();
	
	$pdf->SetFont('Arial','B',12);
	
	$pdf->Cell(2.6,0.2,"Please detail a plan for services",0,0,'L');
	
	$pdf->SetFont('Arial','',12);
	
	$pdf->Cell(3.0,0.2,"(Describe Services, Strategies and Activities):",0,1,'L');

	$pdf->SetFont('Arial','',10);
	
	$pdf->MultiCell(7.0,0.2,"This may include but is not limited to workplace behavior training, job application training, job seeking skills training, interviewing skills training, and job retention skills training. It is expected that these activities conducted by the service provider would be for a minimum of ten hours monthly.",0,'J', 0);
	
	$pdf->Ln();

	$pdf->SetFont('Arial','',12);

	$pdf->MultiCell(6.50,0.2,$_POST['17-Please_detail_a_plan_for_services_(Describe_Services,_Strategies_and_Activities)*'], 0, 'J', 0);
	
	$pdf->Ln();

	$pdf->SetFont('Arial','B',12);
	
	$pdf->Cell(7.0,0.2,'Next Steps:', 0, 1, 'L');

	$pdf->Ln();

	$pdf->SetFont('Arial','',12);
	
	$pdf->MultiCell(6.50,0.2,$_POST['18-Next_Steps*'], 0, 'J', 0);

	$pdf->Ln();

	$pdf->SetFont('Arial','B',12);
	

	$pdf->MultiCell(6.50,0.2,"The provider is required to ensure the participant is registered at the local One-Stop Career Center?", 0, 'J', 0);
	
	$pdf->SetFont('Arial','',12);
	
	$pdf->Cell(2.3,0.2,'Please enter NYS OSOS ID#',0,0,'L');
	
	$pdf->SetFont('Arial','',12);
	
	$pdf->Cell(4.0,0.2,$_POST['19-Please_enter_NYS_OSOS_ID#'],0,1,'L');
	
	
	$pdf->Ln();

	$pdf->Cell(0,0.2,'Please note that an up-to-date resume is required to be submitted with the 929X/935X.','LTRB',1,'C');

	
	
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	
	
	// 	Start of FOOTER-1 Area
	
	$pdf->SetFont('Arial','B',12);
	
	
	$pdf->SetFont('Arial','',11);
	
	
	$pdf->Ln();
	
	
	
	$pdf->Cell(4.0,0.2,'', 'B', 0, 'L');
	
	$pdf->Cell(0.5,0.2,'', 0, 0, 'C');
	
	$pdf->Cell(2.5,0.2,$_POST['20-Participant_Signature_Date'], 'B', 1, 'L');
	
	
	$pdf->Cell(4.0,0.2,'Participant Signature', 0, 0, 'L');
	
	$pdf->Cell(0.5,0.2,'', 0, 0, 'C');
	
	$pdf->Cell(2.5,0.2,'Date', 0, 1, 'L');
	
	
	$pdf->Ln();
	
	
	$pdf->Ln();
	
	// 	Start of FOOTER-2 Area
	
	$pdf->SetFont('Arial','B',12);
	
	
	$pdf->Cell(1.0,0.2,'Completed By: ', 0, 1, 'L');
	
	
	$pdf->SetFont('Arial','',11);
	
	
	$pdf->Ln();
	
	
	
	$pdf->Cell(4.0,0.2,'', 'B', 0, 'L');
	
	$pdf->Cell(0.5,0.2,'', 0, 0, 'C');
	
	$pdf->Cell(2.5,0.2,$_POST['21-Signature_Date'], 'B', 1, 'L');
	
	
	$pdf->Cell(4.0,0.2,'Qualified Staff Signature', 0, 0, 'L');
	
	$pdf->Cell(0.5,0.2,'', 0, 0, 'C');
	
	$pdf->Cell(2.5,0.2,'Date', 0, 1, 'L');
	
	
	$pdf->Ln();
	
	
	
	$pdf->Cell(4.0,0.2,$_POST['22-Printed_Name*'], 'B', 0, 'L');
	
	$pdf->Cell(0.5,0.2,'', 0, 0, 'C');
	
	$pdf->Cell(2.5,0.2,$_POST['23-Title*'], 'B', 1, 'L');
	
	
	$pdf->Cell(4.0,0.2,'Printed Name', 0, 0, 'L');
	
	$pdf->Cell(0.5,0.2,'', 0, 0, 'C');
	
	$pdf->Cell(2.5,0.2,'Title', 0, 1, 'L');
	
	
	$pdf->Ln();
	
	
	$pdf->Cell(1.25,0.2,'Phone Number:', 0, 0, 'L');
	
	
	$pdf->Cell(2.75,0.2,$_POST['24-Phone_Number*'], 0, 0, 'L');
	
	
	$pdf->Cell(0.50,0.2,'', 0, 0, 'C');
	
	
	$pdf->Cell(0.50,0.2,'Email:', 0, 0, 'L');
	
	
	$pdf->Cell(2.00,0.2,$_POST['25-Email*'], 0, 1, 'L');
	
	
	$pdf->Ln();
	
	// 	End of FOOTER-1 Area
	//=	=========================
	$pdf->Output('report.pdf', 'I');
	
}

function renderForm_932X937X($data) {
	
	$pdf = new FPDF('P', 'in', 'Letter');

	$pdf->SetCreator('CEO, Inc.');
	
	$pdf->SetAuthor('CEO, Inc.');
	
	$pdf->SetTitle('Report');
	
	//=	=========================
	$pdf->AddPage('P','Letter');
	
	$pdf->SetFillColor(200,200,200);
	
	$pdf->SetMargins(0.75,0.25,0.75);
	
	
	$pdf->Image(ACCESLOGO,3.75,0.25,1.0,1.0);
	
	$pdf->Ln(0.85);
	
	
	$pdf->SetFont('Arial','B',10);
	
	$pdf->Cell(7.0,0.2,'VR-932X/VR-937X',0,0,'C');
	
	$pdf->Ln();
	
	
	$pdf->SetFont('Arial', 'B', 14);
	
	$pdf->Cell(7.0,0.2,'Job Placement Services',0,0,'C');
	
	$pdf->Ln(0.3);
	
	$pdf->SetFont('Arial','B',13);
	
	$pdf->Cell(7.0,0.2,'Check Appropriate Box:',0,1,'L');
	
	
	$pdf->Ln(0.1);
	
	
	
	$pdf->Cell(0.5,0.2,'',0,0,'L');
	
	
	$pdf->Cell(0.20,0.2,$_POST['1-932X-Job_Retention_Services'] ? 'X' : ' ',1,0,'L');
	
	
	$pdf->Cell(0.05,0.2,'',0,0,'L');
	
	
	$pdf->Cell(6.25,0.2,'932X-Job Retention Services',0,1,'L');
	
	
	$pdf->Ln(0.1);
	
	
	
	$pdf->Cell(0.5,0.2,'',0,0,'L');
	
	
	$pdf->Cell(0.20,0.2,$_POST['2-937X-Job_Retention_Services_(Deaf_Service)'] ? 'X' : ' ',1,0,'L');
	
	
	$pdf->Cell(0.05,0.2,'',0,0,'L');
	
	
	$pdf->Cell(6.25,0.2,'937X-Job Retention Services (Deaf Service)',0,1,'L');
	
	
	$pdf->Ln(0.1);
	
	
	// 	The section below COMMON-1 is on all documents
	
	$pdf->SetFont('Arial', '', 10);
	
	$pdf->Cell(1.75,0.2,'','',0,'L');
	
	$pdf->Cell(1.25,0.2,'AV#:', 'LTB', 0, 'L');
	
	$pdf->Cell(0.75,0.2,'(7 digits)','TB', 0, 'L');
	
	$pdf->Cell(1.25,0.2,$_POST['3-AV#*'],'TBR', 1, 'L');
	
	
	$pdf->Cell(1.75,0.2,'','',0,'L');
	
	$pdf->Cell(1.25,0.2,'ACCES-VR ID#:','LTB',0, 'L');
	
	$pdf->Cell(0.75,0.2,'(6 digits)','TB', 0, 'L');
	
	$pdf->Cell(1.25,0.2,$_POST['4-ACCES-VR_ID#*'],'TBR', 1, 'L');
	
	
	$pdf->Cell(1.75,0.2,'','',0,'L');
	
	$pdf->Cell(1.25,0.2,'CAMS ID #:', 'LTB', 0, 'L');
	
	$pdf->Cell(0.75,0.2,'(10 digits)', 'TB', 0,'L');
	
	$pdf->Cell(1.25,0.2,$_POST['5-CAMS_ID#*'], 'TBR', 1,'L');
	
	
	$pdf->Ln();
	
	
	$pdf->SetFont('Arial','',10);
	
	$pdf->Cell(1.2,0.2,'VR District Office:','LT',0,'L');
	
	$pdf->Cell(2.3,0.2,$_POST['6-VR_District_Office*'],'TR',0,'L');
	
	
	$pdf->Cell(1.0,0.2,'Provider:','LT',0,'L');
	
	$pdf->Cell(2.5,0.2,$_POST['8-Provider*'],'TR',0,'L');
	
	$pdf->Ln();
	
	
	$pdf->Cell(1.2,0.2,'VRC Name:','LT',0,'L');
	
	$pdf->Cell(2.3,0.2,$_POST['7-VRC_Name*'],'TR',0,'L');
	
	
	$pdf->Cell(1.5,0.2,'NYS Fiscal System ID:','LTB',0,'L');
	
	$pdf->Cell(2.0,0.2,'1000018463','TRB',0,'L');
	
	$pdf->Ln();
	
	
	$pdf->Cell(3.5,0.2,'','LTBR',0,'L');
	
	$pdf->Cell(1.0,0.2,'Report Date:','LB',0,'L');
	
	$pdf->Cell(2.5,0.2,$_POST['10-Report_Date*'],'BR',0,'L');
	
	$pdf->Ln();
	
	// 	End of COMMON-1 Area
	// 	Start of COMMON-2a Area  slight variations between forms
	
	$pdf->Ln();
	
	
	$pdf->Cell(1.5,0.2,'Participant First Name:','LTB',0,'L');
	
	$pdf->Cell(2.0,0.2,$_POST['11-Participant_First_Name*'],'TBR',0,'L');
	
	$pdf->Cell(1.5,0.2,'Participant Last Name:','LTB',0,'L');
	
	$pdf->Cell(2.0,0.2,$_POST['12-Participant_Last_Name*'],'TBR',0,'L');
	
	$pdf->Ln();
	
	
	$pdf->Cell(2.0,0.2,'Participant Phone Number: ','LTB',0,'L');
	
	$pdf->Cell(5.0,0.2,$_POST['13-Participant_Phone_Number'],'TBR',0,'L');
	
	$pdf->Ln();
	
	
	$pdf->Cell(2.0,0.2,'Participant Email Address: ','LTB',0,'L');
	
	$pdf->Cell(5.0,0.2,$_POST['14-Participant_Email_Address'],'TBR',0,'L');
	
	$pdf->Ln();
	
	
	// 	End of COMMON-2a Area

	$pdf->Ln();

	$pdf->SetFont('Arial','B',11);
	$pdf->Cell(2.0,0.2,'Placement Information','',1,'L');
	
	// 	Start of CONTENT Area
	
	$pdf->Cell(7.0,0.2,'','LTR',1,'C');
	
	
	$pdf->SetFont('Arial','B',11);
	
	$pdf->Cell(0.05,0.2,'Job Title:','L',0,'L');
	
	$pdf->SetFont('Arial','',11);
	
	//$	pdf->Cell(0.4,0.2,'',0,0,'L');
	
	$pdf->Cell(1.5,0.2,$_POST['15-Job_Title*'],0,0,'R');
	
	$pdf->Cell(5.45,0.2,'','R',1,'C');
	
	
	$pdf->Cell(7.0,0.2,'','LR',1,'C');
	
	
	$pdf->SetFont('Arial','B',11);
	
	$pdf->Cell(2.1,0.2,'Business Name (Employer):','L',0,'L');
	
	$pdf->SetFont('Arial','',11);
	
	//$	pdf->Cell(0.4,0.2,'',0,0,'L');
	
	$pdf->Cell(4.5,0.2,$_POST['16-Business_Name_(Employer)*'],0,0,'L');
	
	$pdf->Cell(0.4,0.2,'','R',1,'C');
	
	
	$pdf->Cell(7.0,0.2,'','LR',1,'C');

	//====
	$pdf->SetFont('Arial','B',11);
	
	$pdf->Cell(2.1,0.2,'Business Address:','L',0,'L');
	
	$pdf->SetFont('Arial','',11);
	
	//$	pdf->Cell(0.4,0.2,'',0,0,'L');
	
	$pdf->Cell(4.5,0.2,$_POST['17-Business_Address*'],0,0,'L');
	
	$pdf->Cell(0.4,0.2,'','R',1,'C');
	
	
	$pdf->Cell(7.0,0.2,'','LR',1,'C');
	//=====

	//====
	$pdf->SetFont('Arial','B',11);
		
	$pdf->Cell(2.1,0.2,'Start Date of Employment:','L',0,'L');

	$pdf->SetFont('Arial','',11);

	//$	pdf->Cell(0.4,0.2,'',0,0,'L');

	$pdf->Cell(4.5,0.2,$_POST['18-Start_Date_of_Employment*'],0,0,'L');

	$pdf->Cell(0.4,0.2,'','R',1,'C');


	$pdf->Cell(7.0,0.2,'','LR',1,'C');
	//=====

	//====
	$pdf->SetFont('Arial','B',11);
		
	$pdf->Cell(2.1,0.2,'Date 90-day Retention:','L',0,'L');

	$pdf->SetFont('Arial','',11);

	//$	pdf->Cell(0.4,0.2,'',0,0,'L');

	$pdf->Cell(4.5,0.2,$_POST['19-Date_90-day_Retention*'],0,0,'L');

	$pdf->Cell(0.4,0.2,'','R',1,'C');


	$pdf->Cell(7.0,0.2,'','LR',1,'C');
	//=====

	//====
	$pdf->SetFont('Arial','B',11);
		
	$pdf->Cell(2.1,0.2,'Work Schedule/Hours:','L',0,'L');

	$pdf->SetFont('Arial','',11);

	//$	pdf->Cell(0.4,0.2,'',0,0,'L');

	$pdf->Cell(4.5,0.2,$_POST['20-Work_Schedule/Hours*'],0,0,'L');

	$pdf->Cell(0.4,0.2,'','R',1,'C');


	$pdf->Cell(7.0,0.2,'','LR',1,'C');
	//=====

	//====
	$pdf->SetFont('Arial','B',11);
		
	$pdf->Cell(2.1,0.2,'Wages:','L',0,'L');

	$pdf->SetFont('Arial','',11);

	//$	pdf->Cell(0.4,0.2,'',0,0,'L');

	$pdf->Cell(4.5,0.2,$_POST['21-Wages*'],0,0,'L');

	$pdf->Cell(0.4,0.2,'','R',1,'C');


	$pdf->Cell(7.0,0.2,'','LR',1,'C');
	//=====

	//====
	$pdf->SetFont('Arial','B',11);
		
	$pdf->Cell(7.0,0.2,'Essential Functions of the Position:','LR',1,'L');

	$pdf->SetFont('Arial','',11);

	//$	pdf->Cell(0.4,0.2,'',0,0,'L');

	$pdf->MultiCell(7.0,0.2,$_POST['22-Essential_Functions_of_the_Position*'], 'LR', 'J', 0);
	//$pdf->Cell(4.5,0.2,$_POST['22-Essential_Functions_of_the_Position*'],0,0,'L');


	$pdf->Cell(7.0,0.2,'','LBR',1,'C');
	//=====

	$pdf->Ln();
	
	$pdf->SetFont('Arial','B',11);
	$pdf->Cell(7.0,0.2,'','LTR',1,'L');
	
	$pdf->Cell(2.5,0.2,'Medical Benefits','L',0,'L');
	
	$pdf->SetFont('Arial','',11);
	
	$pdf->Cell(0.15,0.15, $_POST['23-Medical_Benefits:_Yes'] ? 'X' : ' ',1,0,'C');
	
	$pdf->Cell(0.2,0.2,'',0,0,'L');
	
	$pdf->Cell(1.5,0.2,'Yes',0,0,'L');
	
	$pdf->Cell(0.15,0.15, $_POST['24-Medical_Benefits:_No'] ? 'X' : ' ',1,0,'C');
	
	$pdf->Cell(0.2,0.2,'',0,0,'L');
	
	$pdf->Cell(2.0,0.2,'No',0,0,'L');
	
	$pdf->Cell(0.3,0.2,'','R',1,'C');
	
	
	$pdf->SetFont('Arial','B',11);
	
	$pdf->Cell(7.0,0.2,'','LR',1,'L');
	
	$pdf->Cell(7.0,0.2,"Other Benefits:",'LR',1,'L');
	
	$pdf->SetFont('Arial','',11);
	
	$pdf->MultiCell(7.0,0.2, $_POST["25-Other_Benefits"],'LR','j', 0);



	$pdf->SetFont('Arial','B',11);
	$pdf->Cell(7.0,0.2,'','LR',1,'L');
	
	$pdf->Cell(7.0,0.2,'Was this placement a direct result of Work-Readiness 3 Service?','LR',1,'L');
	
	$pdf->SetFont('Arial','',11);

	$pdf->Cell(0.80,0.2,'','L',0,'L');
	
	$pdf->Cell(0.15,0.15, $_POST['26-Was_this_placement_a_direct_result_of_Work-Readiness_3_Service:_Yes'] ? 'X' : ' ',1,0,'C');
	
	$pdf->Cell(0.2,0.2,'',0,0,'L');
	
	$pdf->Cell(1.5,0.2,'Yes',0,0,'L');
	
	$pdf->Cell(0.15,0.15, $_POST['27-Was_this_placement_a_direct_result_of_Work-Readiness_3_Service:_No'] ? 'X' : ' ',1,0,'C');
	
	$pdf->Cell(0.2,0.2,'',0,0,'L');
	
	$pdf->Cell(2.0,0.2,'No',0,0,'L');
	
	$pdf->Cell(2.0,0.2,'','R',1,'C');


	$pdf->SetFont('Arial','B',11);
	$pdf->Cell(7.0,0.2,'','LR',1,'L');
	
	$pdf->MultiCell(7.0,0.2, "Is the participant satisfied with employment and agreeable to case closure (with the understanding that future applications for ACCES-VR Services is an option if their employment situation changes)?",'LR','j', 0);
	
	$pdf->SetFont('Arial','',11);

	$pdf->Cell(0.80,0.2,'','L',0,'L');
	
	$pdf->Cell(0.15,0.15, $_POST['28-Is_the_participant_satisfied_with_employment_and_agreeable_to_case_closure_(with_the_understanding_that_future_applications_for_ACCES-VR_Services_is_an_option_if_their_employment_situation_changes):_Yes'] ? 'X' : ' ',1,0,'C');
	
	$pdf->Cell(0.2,0.2,'',0,0,'L');
	
	$pdf->Cell(1.5,0.2,'Yes',0,0,'L');
	
	$pdf->Cell(0.15,0.15, $_POST['29-Is_the_participant_satisfied_with_employment_and_agreeable_to_case_closure_(with_the_understanding_that_future_applications_for_ACCES-VR_Services_is_an_option_if_their_employment_situation_changes):_No'] ? 'X' : ' ',1,0,'C');
	
	$pdf->Cell(0.2,0.2,'',0,0,'L');
	
	$pdf->Cell(2.0,0.2,'No',0,0,'L');
	
	$pdf->Cell(2.0,0.2,'','R',1,'C');


	$pdf->SetFont('Arial','',11);
	
	$pdf->Cell(7.0,0.2,'','LR',1,'L');
	
	$pdf->Cell(7.0,0.2,"If No, explain: ",'LR',1,'L');
	
	$pdf->SetFont('Arial','',11);
	
	$pdf->MultiCell(7.0,0.2, $_POST["30-If_no,_explain"],'LR','j', 0);


	$pdf->SetFont('Arial','B',11);
	
	$pdf->Cell(7.0,0.2,'','LR',1,'L');
	
	$pdf->Cell(7.0,0.2,"Describe Retention Services Provided: ",'LR',1,'L');
	
	$pdf->SetFont('Arial','',11);
	
	$pdf->MultiCell(7.0,0.2, $_POST["31-Describe_Retention_Services_Provided*"],'LR','j', 0);


	$pdf->SetFont('Arial','B',11);
	
	$pdf->Cell(7.0,0.2,'','LR',1,'L');
	
	$pdf->Cell(7.0,0.2,"Comments/Other Information: ",'LR',1,'L');
	
	$pdf->SetFont('Arial','',11);
	
	$pdf->MultiCell(7.0,0.2, $_POST["32-Comments/Other_Information"],'LR','j', 0);
	
	
	$pdf->Cell(7.0,0.2,'','LBR',1,'C');
	
	
	// 	Start of FOOTER-1 Area
	$pdf->Ln();
	
	
	$pdf->SetFont('Arial','B',12);
	
	$pdf->Cell(1.0,0.2,'Completed By: ', 0, 1, 'L');
	
	$pdf->SetFont('Arial','',11);
	
	$pdf->Ln();
	
	
	$pdf->Cell(4.0,0.2,'', 'B', 0, 'L');
	$pdf->Cell(0.5,0.2,'', 0, 0, 'C');
	$pdf->Cell(2.5,0.2,$_POST['33-Signature_Date'], 'B', 1, 'L');
	
	$pdf->Cell(4.0,0.2,'Qualified Staff Signature', 0, 0, 'L');
	$pdf->Cell(0.5,0.2,'', 0, 0, 'C');
	$pdf->Cell(2.5,0.2,'Date', 0, 1, 'L');
	
	$pdf->Ln();
	
	
	$pdf->Cell(4.0,0.2,$_POST['34-Printed_Name*'], 'B', 0, 'L');
	$pdf->Cell(0.5,0.2,'', 0, 0, 'C');
	$pdf->Cell(2.5,0.2,$_POST['35-Title*'], 'B', 1, 'L');
	
	$pdf->Cell(4.0,0.2,'Printed Name', 0, 0, 'L');
	$pdf->Cell(0.5,0.2,'', 0, 0, 'C');
	$pdf->Cell(2.5,0.2,'Title', 0, 1, 'L');
	
	$pdf->Ln();
	
	$pdf->Cell(1.25,0.2,'Phone Number:', 0, 0, 'L');
	
	$pdf->Cell(2.75,0.2,$_POST['36-Phone_Number*'], 0, 0, 'L');
	
	$pdf->Cell(0.50,0.2,'', 0, 0, 'C');
	
	$pdf->Cell(0.50,0.2,'Email:', 0, 0, 'L');
	
	$pdf->Cell(2.00,0.2,$_POST['37-Email*'], 0, 1, 'L');
	
	$pdf->Ln();
	
	$pdf->Ln();
	
	//=	=========================
	$pdf->Output('report.pdf', 'I');
	
}

function renderForm_123X($data) {
	
	$pdf = new FPDF('P', 'in', 'Letter');

	$pdf->SetCreator('CEO, Inc.');
	
	$pdf->SetAuthor('CEO, Inc.');
	
	$pdf->SetTitle('Report');
	
	//=	=========================
	$pdf->AddPage('P','Letter');
	
	$pdf->SetFillColor(200,200,200);
	
	$pdf->SetMargins(0.75,0.25,0.75);
	
	
	$pdf->Image(ACCESLOGO,3.75,0.25,1.0,1.0);
	
	$pdf->Ln(0.85);
	
	
	$pdf->SetFont('Arial','B',10);
	
	$pdf->Cell(7.0,0.2,'VR-123X',0,0,'C');
	
	$pdf->Ln();
	
	
	$pdf->SetFont('Arial', 'B', 14);
	
	$pdf->Cell(7.0,0.2,'Job Preparation Services',0,0,'C');
	
	$pdf->Ln(0.3);
	
	$pdf->SetFont('Arial','B',13);
	
	$pdf->Cell(7.0,0.2,'123X - Self-Advocacy for Employment',0,1,'C');
	
	$pdf->Ln(0.3);
	
	
	// 	The section below COMMON-1 is on all documents

	$pdf->SetFont('Arial', '', 10);

	$pdf->Cell(1.75,0.2,'','',0,'L');
	
	$pdf->Cell(1.25,0.2,'AV#:', 'LTB', 0, 'L');
	
	$pdf->Cell(0.75,0.2,'(7 digits)','TB', 0, 'L');
	
	$pdf->Cell(1.25,0.2,$_POST['1-AV#*'],'TBR', 1, 'L');
	
	
	$pdf->Cell(1.75,0.2,'','',0,'L');
	
	$pdf->Cell(1.25,0.2,'ACCES-VR ID#:','LTB',0, 'L');
	
	$pdf->Cell(0.75,0.2,'(6 digits)','TB', 0, 'L');
	
	$pdf->Cell(1.25,0.2,$_POST['2-ACCES-VR_ID#*'],'TBR', 1, 'L');
	
	
	$pdf->Cell(1.75,0.2,'','',0,'L');
	
	$pdf->Cell(1.25,0.2,'CAMS ID #:', 'LTB', 0, 'L');
	
	$pdf->Cell(0.75,0.2,'(10 digits)', 'TB', 0,'L');
	
	$pdf->Cell(1.25,0.2,$_POST['3-CAMS_ID#*'], 'TBR', 1,'L');
	
	
	$pdf->Ln();
	
	
	$pdf->SetFont('Arial','',10);
	
	$pdf->Cell(1.2,0.2,'VR District Office:','LT',0,'L');
	
	$pdf->Cell(2.3,0.2,$_POST['4-VR_District_Office*'],'TR',0,'L');
	
	
	$pdf->Cell(1.0,0.2,'Provider:','LT',0,'L');
	
	$pdf->Cell(2.5,0.2,$_POST['6-Provider*'],'TR',0,'L');
	
	$pdf->Ln();
	
	
	$pdf->Cell(1.2,0.2,'VRC Name:','LT',0,'L');
	
	$pdf->Cell(2.3,0.2,$_POST['5-VRC_Name*'],'TR',0,'L');
	
	
	$pdf->Cell(1.5,0.2,'NYS Fiscal System ID:','LTB',0,'L');
	
	$pdf->Cell(2.0,0.2,'1000018463','TRB',0,'L');
	
	$pdf->Ln();
	
	
	$pdf->Cell(3.5,0.2,'','LTBR',0,'L');
	
	$pdf->Cell(1.0,0.2,'Report Date:','LB',0,'L');
	
	$pdf->Cell(2.5,0.2,$_POST['8-Report_Date*'],'BR',0,'L');
	
	$pdf->Ln();
	
	// 	End of COMMON-1 Area
	// 	Start of COMMON-2a Area  slight variations between forms
	
	$pdf->Ln();
	
	
	$pdf->Cell(1.5,0.2,'Participant First Name:','LTB',0,'L');
	
	$pdf->Cell(2.0,0.2,$_POST['9-Participant_First_Name*'],'TBR',0,'L');
	
	$pdf->Cell(1.5,0.2,'Participant Last Name:','LTB',0,'L');
	
	$pdf->Cell(2.0,0.2,$_POST['10-Participant_Last_Name*'],'TBR',0,'L');
	
	$pdf->Ln();
	
	
	$pdf->Cell(2.0,0.2,'Participant Phone Number: ','LTB',0,'L');
	
	$pdf->Cell(5.0,0.2,$_POST['11-Participant_Phone_Number'],'TBR',0,'L');
	
	$pdf->Ln();
	
	
	$pdf->Cell(2.0,0.2,'Participant Email Address: ','LTB',0,'L');
	
	$pdf->Cell(5.0,0.2,$_POST['12-Participant_Email_Address'],'TBR',0,'L');
	
	$pdf->Ln();
	
	
	// 	End of COMMON-2a Area

	$pdf->Ln();
	
	// 	Start of CONTENT Area
	
	$pdf->Cell(7.0,0.2,'','LTR',1,'C');
	
	
	$pdf->SetFont('Arial','B',11);
	
	$pdf->Cell(2.0,0.2,'Units of Service Utilized:','L',0,'L');
	
	$pdf->SetFont('Arial','',11);
	
	//$	pdf->Cell(0.4,0.2,'',0,0,'L');
	
	$pdf->Cell(1.25,0.2,$_POST['13-Units_of_Service_Utilized*'],0,0,'R');
	
	$pdf->Cell(3.75,0.2,'','R',1,'C');
	
	
	$pdf->Cell(7.0,0.2,'','LR',1,'C');
	
	
	$pdf->SetFont('Arial','B',11);
	
	$pdf->Cell(2.0,0.2,'Dates of Service:','L',0,'L');
	
	$pdf->SetFont('Arial','',11);
	
	//$	pdf->Cell(0.4,0.2,'',0,0,'L');
	
	$pdf->Cell(4.5,0.2,$_POST['14-Dates_of_Service*'],0,0,'L');
	
	$pdf->Cell(0.5,0.2,'','R',1,'C');
	
	
	$pdf->Cell(7.0,0.2,'','LR',1,'C');


	$pdf->SetFont('Arial','B',11);
	$pdf->Cell(7.0,0.2,'Was the service provided individually or in a group (no more than 5)?','LR',1,'L');
	
	$pdf->Cell(7.0,0.2,'','LR',1);
	
	$pdf->SetFont('Arial','',11);
	
	$pdf->Cell(2.00,0.2,'  ','L',0);
	
	$pdf->Cell(0.15,0.15, $_POST['15-Was_the_service_provided_individually_or_in_a_group_(no_more_than_5):_Individual'] ? 'X' : ' ', 1, 0, 'C');
	
	$pdf->Cell(1.50,0.15, 'Individual', 0, 0, 'C');
	
	$pdf->Cell(0.15,0.15, $_POST['16-Was_the_service_provided_individually_or_in_a_group_(no_more_than_5):_Group'] ? 'X' : ' ', 1, 0, 'C');
	
	$pdf->Cell(1.50,0.15, 'Group', '', 0, 'C');
	
	$pdf->Cell(1.70,0.2,'  ','R',1,'L');
	
	$pdf->Cell(7.0,0.2,'','LR',1);



	$pdf->SetFont('Arial','B',11);
	$pdf->MultiCell(7.0,0.2,"If group format, was the curriculum and syllabus approved by the District Office? (Maintain documentation of this approval in agency records)",'LR','J',0);
	
	$pdf->Cell(7.0,0.2,'','LR',1);
	
	$pdf->SetFont('Arial','',11);
	
	$pdf->Cell(2.00,0.2,'  ','L',0);
	
	$pdf->Cell(0.15,0.15, $_POST['17-If_group_format,_was_the_curriculum_and_syllabus_approved_by_the_District_Office?:_Yes'] ? 'X' : ' ', 1, 0, 'C');
	
	$pdf->Cell(1.50,0.15, 'Yes', 0, 0, 'C');
	
	$pdf->Cell(0.15,0.15, $_POST['18-If_group_format,_was_the_curriculum_and_syllabus_approved_by_the_District_Office?:_No'] ? 'X' : ' ', 1, 0, 'C');
	
	$pdf->Cell(1.50,0.15, 'No', '', 0, 'C');
	
	$pdf->Cell(1.70,0.2,'  ','R',1,'L');
	
	$pdf->Cell(7.0,0.2,'','LR',1);

	$pdf->SetFont('Arial','B',11);
	$pdf->MultiCell(7.0,0.4,"Does the Self-Advocacy for Employment report include the following topics?",'LR','J',0);

	

	//====
	$pdf->SetFont('Arial','',11);
	
	$pdf->Cell(2.75,0.2,'Career and Employment Exploration','L',0,'L');
	
	$pdf->SetFont('Arial','',11);
	
	$pdf->Cell(0.15,0.15, $_POST['19-Does_the_Self-Advocacy_for_Employment_report_include_Career_and_Employment_Exploration:_Yes'] ? 'X' : ' ',1,0,'C');
	
	$pdf->Cell(0.2,0.2,'',0,0,'L');
	
	$pdf->Cell(1.5,0.2,'Yes',0,0,'L');
	
	$pdf->Cell(0.15,0.15, $_POST['20-Does_the_Self-Advocacy_for_Employment_report_include_Career_and_Employment_Exploration:_No'] ? 'X' : ' ',1,0,'C');
	
	$pdf->Cell(0.2,0.2,'',0,0,'L');
	
	$pdf->Cell(2.0,0.2,'No',0,0,'L');
	
	$pdf->Cell(0.05,0.2,'','R',1,'C');
	//====

	$pdf->Cell(7.0,0.2,'','LR',1,'C');


	//====
	$pdf->SetFont('Arial','',11);
	
	$pdf->Cell(2.5,0.2,'Personal Strengths','L',0,'L');
	
	$pdf->SetFont('Arial','',11);
	
	$pdf->Cell(0.15,0.15, $_POST['21-Does_the_Self-Advocacy_for_Employment_report_include_Personal_Strengths:_Yes'] ? 'X' : ' ',1,0,'C');
	
	$pdf->Cell(0.2,0.2,'',0,0,'L');
	
	$pdf->Cell(1.5,0.2,'Yes',0,0,'L');
	
	$pdf->Cell(0.15,0.15, $_POST['22-Does_the_Self-Advocacy_for_Employment_report_include_Personal_Strengths:_No'] ? 'X' : ' ',1,0,'C');
	
	$pdf->Cell(0.2,0.2,'',0,0,'L');
	
	$pdf->Cell(2.0,0.2,'No',0,0,'L');
	
	$pdf->Cell(0.3,0.2,'','R',1,'C');
	//====

	$pdf->Cell(7.0,0.2,'','LR',1,'C');

	//====
	$pdf->SetFont('Arial','',11);
		
	$pdf->Cell(2.5,0.2,'Talents','L',0,'L');

	$pdf->SetFont('Arial','',11);

	$pdf->Cell(0.15,0.15, $_POST['23-Does_the_Self-Advocacy_for_Employment_report_include_Talents:_Yes'] ? 'X' : ' ',1,0,'C');

	$pdf->Cell(0.2,0.2,'',0,0,'L');

	$pdf->Cell(1.5,0.2,'Yes',0,0,'L');

	$pdf->Cell(0.15,0.15, $_POST['24-Does_the_Self-Advocacy_for_Employment_report_include_Talents:_No'] ? 'X' : ' ',1,0,'C');

	$pdf->Cell(0.2,0.2,'',0,0,'L');

	$pdf->Cell(2.0,0.2,'No',0,0,'L');

	$pdf->Cell(0.3,0.2,'','R',1,'C');
	//====

	$pdf->Cell(7.0,0.2,'','LR',1,'C');


	//====
	$pdf->SetFont('Arial','',11);
		
	$pdf->Cell(2.5,0.2,'Compensatory Skills','L',0,'L');

	$pdf->SetFont('Arial','',11);

	$pdf->Cell(0.15,0.15, $_POST['25-Does_the_Self-Advocacy_for_Employment_report_include_Compensatory_Skills:_Yes'] ? 'X' : ' ',1,0,'C');

	$pdf->Cell(0.2,0.2,'',0,0,'L');

	$pdf->Cell(1.5,0.2,'Yes',0,0,'L');

	$pdf->Cell(0.15,0.15, $_POST['26-Does_the_Self-Advocacy_for_Employment_report_include_Compensatory_Skills:_No'] ? 'X' : ' ',1,0,'C');

	$pdf->Cell(0.2,0.2,'',0,0,'L');

	$pdf->Cell(2.0,0.2,'No',0,0,'L');

	$pdf->Cell(0.3,0.2,'','R',1,'C');
	//====

	$pdf->Cell(7.0,0.2,'','LR',1,'C');

	//====
	$pdf->SetFont('Arial','',11);
		
	$pdf->Cell(2.5,0.2,'Natural Supports','L',0,'L');

	$pdf->SetFont('Arial','',11);

	$pdf->Cell(0.15,0.15, $_POST['27-Does_the_Self-Advocacy_for_Employment_report_include_Natural_Supports:_Yes'] ? 'X' : ' ',1,0,'C');

	$pdf->Cell(0.2,0.2,'',0,0,'L');

	$pdf->Cell(1.5,0.2,'Yes',0,0,'L');

	$pdf->Cell(0.15,0.15, $_POST['28--Does_the_Self-Advocacy_for_Employment_report_include_Natural_Supports:_No'] ? 'X' : ' ',1,0,'C');

	$pdf->Cell(0.2,0.2,'',0,0,'L');

	$pdf->Cell(2.0,0.2,'No',0,0,'L');

	$pdf->Cell(0.3,0.2,'','R',1,'C');
	//====

	$pdf->Cell(7.0,0.2,'','LR',1,'C');

	//====
	$pdf->SetFont('Arial','',11);
		
	$pdf->Cell(3.0,0.2,'Disability Specific Accommodation Needs','L',0,'L');

	$pdf->SetFont('Arial','',11);

	$pdf->Cell(0.15,0.15, $_POST['29-Does_the_Self-Advocacy_for_Employment_report_include_Disability_Specific_Accommodation_Needs:_Yes'] ? 'X' : ' ',1,0,'C');

	$pdf->Cell(0.2,0.2,'',0,0,'L');

	$pdf->Cell(1.5,0.2,'Yes',0,0,'L');

	$pdf->Cell(0.15,0.15, $_POST['30-Does_the_Self-Advocacy_for_Employment_report_include_Disability_Specific_Accommodation_Needs:_No'] ? 'X' : ' ',1,0,'C');

	$pdf->Cell(0.2,0.2,'',0,0,'L');

	$pdf->Cell(2.0,0.2,'No',0,0,'L');

	$pdf->Cell(0,0.2,'','R',1,'C');
	//====

	$pdf->Cell(7.0,0.2,'','LR',1,'C');


	//====
	$pdf->SetFont('Arial','',11);
		
	$pdf->Cell(3.25,0.2,'How to request a Reasonable Accommodation','L',0,'L');

	$pdf->SetFont('Arial','',11);

	$pdf->Cell(0.15,0.15, $_POST['31-Does_the_Self-Advocacy_for_Employment_report_include_How_to_request_a_Reasonable_Accommodation:_Yes'] ? 'X' : ' ',1,0,'C');

	$pdf->Cell(0.2,0.2,'',0,0,'L');

	$pdf->Cell(1.5,0.2,'Yes',0,0,'L');

	$pdf->Cell(0.15,0.15, $_POST['32-Does_the_Self-Advocacy_for_Employment_report_include_How_to_request_a_Reasonable_Accommodation:_No'] ? 'X' : ' ',1,0,'C');

	$pdf->Cell(0.2,0.2,'',0,0,'L');

	$pdf->Cell(2.0,0.2,'No',0,0,'L');

	$pdf->Cell(0,0.2,'','R',1,'C');
	//====

	$pdf->Cell(7.0,0.2,'','LR',1,'C');

	//====
	$pdf->SetFont('Arial','',11);
		
	$pdf->Cell(2.5,0.2,'Disclosure of Disability','L',0,'L');

	$pdf->SetFont('Arial','',11);

	$pdf->Cell(0.15,0.15, $_POST['33-Does_the_Self-Advocacy_for_Employment_report_include_Disclosure_of_Disability:_Yes'] ? 'X' : ' ',1,0,'C');

	$pdf->Cell(0.2,0.2,'',0,0,'L');

	$pdf->Cell(1.5,0.2,'Yes',0,0,'L');

	$pdf->Cell(0.15,0.15, $_POST['34-Does_the_Self-Advocacy_for_Employment_report_include_Disclosure_of_Disability:_No'] ? 'X' : ' ',1,0,'C');

	$pdf->Cell(0.2,0.2,'',0,0,'L');

	$pdf->Cell(2.0,0.2,'No',0,0,'L');

	$pdf->Cell(0.3,0.2,'','R',1,'C');
	//====

	$pdf->Cell(7.0,0.2,'','LR',1,'C');

	//====
	$pdf->SetFont('Arial','',11);
		
	$pdf->Cell(2.75,0.2,'Employment Rights under Title 1 ADA','L',0,'L');

	$pdf->SetFont('Arial','',11);

	$pdf->Cell(0.15,0.15, $_POST['35-Does_the_Self-Advocacy_for_Employment_report_include_Employment_Rights_under_Title_1_ADA:_Yes'] ? 'X' : ' ',1,0,'C');

	$pdf->Cell(0.2,0.2,'',0,0,'L');

	$pdf->Cell(1.5,0.2,'Yes',0,0,'L');

	$pdf->Cell(0.15,0.15, $_POST['36-Does_the_Self-Advocacy_for_Employment_report_include_Employment_Rights_under_Title_1_ADA:_No'] ? 'X' : ' ',1,0,'C');

	$pdf->Cell(0.2,0.2,'',0,0,'L');

	$pdf->Cell(2.0,0.2,'No',0,0,'L');

	$pdf->Cell(0.05,0.2,'','R',1,'C');
	//====

	$pdf->Cell(7.0,0.2,'','LR',1,'C');

	$pdf->SetFont('Arial','',11);
	
	$pdf->Cell(7.0,0.2,'','LR',1,'L');
	
	$pdf->Cell(7.0,0.2,"If any of the above have not been addressed, specify why:",'LR',1,'L');
	
	$pdf->SetFont('Arial','',11);
	
	$pdf->MultiCell(7.0,0.2, $_POST["37-If_any_of_the_above_have_not_been_addressed,_specify_why"],'LR','j', 0);


	$pdf->Cell(7.0,0.2,'','LR',1,'C');


	$pdf->SetFont('Arial','B',11);
	$pdf->Cell(7.0,0.2,'Has the participant actively demonstrated increased competency in the above areas?','LR',1,'L');
	
	$pdf->Cell(7.0,0.2,'','LR',1);
	
	$pdf->SetFont('Arial','',11);
	
	$pdf->Cell(2.00,0.2,'  ','L',0);
	
	$pdf->Cell(0.15,0.15, $_POST['38-Has_the_participant_actively_demonstrated_increased_competency_in_the_above_areas:_Yes'] ? 'X' : ' ', 1, 0, 'C');
	
	$pdf->Cell(1.50,0.15, 'Yes', 0, 0, 'C');
	
	$pdf->Cell(0.15,0.15, $_POST['39-Has_the_participant_actively_demonstrated_increased_competency_in_the_above_areas:_No'] ? 'X' : ' ', 1, 0, 'C');
	
	$pdf->Cell(1.50,0.15, 'No', '', 0, 'C');
	
	$pdf->Cell(1.70,0.2,'  ','R',1,'L');


	$pdf->SetFont('Arial','',11);
	
	$pdf->Cell(7.0,0.2," Please summarize:",'LR',1,'L');
	
	$pdf->SetFont('Arial','',11);
	
	$pdf->MultiCell(7.0,0.2, $_POST["40-Has_the_participant_actively_demonstrated_increased_competency_in_the_above_areas:_Please_Summarize"],'LR','j', 0);


	$pdf->Cell(7.0,0.2,'','LR',1,'C');



	$pdf->SetFont('Arial','B',11);
	$pdf->Cell(7.0,0.2,'Does Self-Advocacy for Employment report include a checklist of newly mastered skills','LR',1,'L');
	$pdf->Cell(7.0,0.2,'and competencies the participant has attained?','LR',1,'L');
	$pdf->Cell(7.0,0.2,'','LR',1);
	
	$pdf->SetFont('Arial','',11);
	
	$pdf->Cell(2.00,0.2,'  ','L',0);
	
	$pdf->Cell(0.15,0.15, $_POST['41-Does_Self-Advocacy_for_Employment_Report_Include_a_checklist_of_newly_mastered_skills_and_competencies_the_participant_has_attained:_Yes'] ? 'X' : ' ', 1, 0, 'C');
	
	$pdf->Cell(1.50,0.15, 'Yes', 0, 0, 'C');
	
	$pdf->Cell(0.15,0.15, $_POST['42-Does_Self-Advocacy_for_Employment_Report_Include_a_checklist_of_newly_mastered_skills_and_competencies_the_participant_has_attained:_No'] ? 'X' : ' ', 1, 0, 'C');
	
	$pdf->Cell(1.50,0.15, 'No', '', 0, 'C');
	
	$pdf->Cell(1.70,0.2,'  ','R',1,'L');


	$pdf->SetFont('Arial','',11);
	
	$pdf->Cell(7.0,0.2," Please summarize:",'LR',1,'L');
	
	$pdf->SetFont('Arial','',11);
	
	$pdf->MultiCell(7.0,0.2, $_POST["43-Does_Self-Advocacy_for_Employment_Report_Include_a_checklist_of_newly_mastered_skills_and_competencies_the_participant_has_attained:_Comments"],'LR','j', 0);
	
	$pdf->Cell(7.0,0.2,'','LBR',1,'C');
	
	
	// 	Start of FOOTER-1 Area
	$pdf->Ln();
	
	
	$pdf->SetFont('Arial','B',12);
	
	$pdf->Cell(1.0,0.2,'Completed By: ', 0, 1, 'L');
	
	$pdf->SetFont('Arial','',11);
	
	$pdf->Ln();
	
	
	$pdf->Cell(4.0,0.2,'', 'B', 0, 'L');
	$pdf->Cell(0.5,0.2,'', 0, 0, 'C');
	$pdf->Cell(2.5,0.2,$_POST['44-Signature_Date*'], 'B', 1, 'L');
	
	$pdf->Cell(4.0,0.2,'Qualified Staff Signature', 0, 0, 'L');
	$pdf->Cell(0.5,0.2,'', 0, 0, 'C');
	$pdf->Cell(2.5,0.2,'Date', 0, 1, 'L');
	
	$pdf->Ln();
	
	
	$pdf->Cell(4.0,0.2,$_POST['45-Printed_Name*'], 'B', 0, 'L');
	$pdf->Cell(0.5,0.2,'', 0, 0, 'C');
	$pdf->Cell(2.5,0.2,$_POST['46-Title*'], 'B', 1, 'L');
	
	$pdf->Cell(4.0,0.2,'Printed Name', 0, 0, 'L');
	$pdf->Cell(0.5,0.2,'', 0, 0, 'C');
	$pdf->Cell(2.5,0.2,'Title', 0, 1, 'L');
	
	$pdf->Ln();
	
	$pdf->Cell(1.25,0.2,'Phone Number:', 0, 0, 'L');
	
	$pdf->Cell(2.75,0.2,$_POST['47-Phone_Number*'], 0, 0, 'L');
	
	$pdf->Cell(0.50,0.2,'', 0, 0, 'C');
	
	$pdf->Cell(0.50,0.2,'Email:', 0, 0, 'L');
	
	$pdf->Cell(2.00,0.2,$_POST['48-Email*'], 0, 1, 'L');
	
	$pdf->Ln();
	
	$pdf->Ln();
	
	//=	=========================
	$pdf->Output('report.pdf', 'I');
	
}

function renderForm_557X($data) {

	$pdf = new FPDF('P', 'in', 'Letter');
	
	$pdf->SetCreator('CEO, Inc.');
	
	$pdf->SetAuthor('CEO, Inc.');
	
	$pdf->SetTitle('Report');
	
	//=	=========================
	$pdf->AddPage('P','Letter');
	
	$pdf->SetFillColor(200,200,200);
	
	$pdf->SetMargins(0.75,0.25,0.75);
	
	$pdf->Image(ACCESLOGO,3.75,0.25,1.0,1.0);
	
	$pdf->Ln(0.85);
	
	
	$pdf->SetFont('Arial','B',10);
	
	$pdf->Cell(7.0,0.2,'VR-557X',0,0,'C');
	
	$pdf->Ln();
	
	
	$pdf->SetFont('Arial', 'B', 14);
	
	$pdf->Cell(7.0,0.2,'Pre-Employment Transition Services (Pre-ETS)',0,0,'C');
	
	$pdf->Ln(0.3);
	
	$pdf->SetFont('Arial','B',13);
	
	$pdf->Cell(7.0,0.2,'557X- Work-Based Learning Development',0,1,'C');
	
	$pdf->Ln(0.3);
	
	
	// 	The section below COMMON-1 is on all documents
	
	$pdf->SetFont('Arial', '', 10);
	
	$pdf->Cell(1.75,0.2,'','',0,'L');
	
	$pdf->Cell(1.25,0.2,'AV#:', 'LTB', 0, 'L');
	
	$pdf->Cell(0.75,0.2,'(7 digits)','TB', 0, 'L');
	
	$pdf->Cell(1.25,0.2,$data->av_num,'TBR', 1, 'L');
	
	
	$pdf->Cell(1.75,0.2,'','',0,'L');
	
	$pdf->Cell(1.25,0.2,'ACCES-VR ID#:','LTB',0, 'L');
	
	$pdf->Cell(0.75,0.2,'(6 digits)','TB', 0, 'L');
	
	$pdf->Cell(1.25,0.2,$data->acces_id,'TBR', 1, 'L');
	
	
	$pdf->Cell(1.75,0.2,'','',0,'L');
	
	$pdf->Cell(1.25,0.2,'CAMS ID #:', 'LTB', 0, 'L');
	
	$pdf->Cell(0.75,0.2,'(10 digits)', 'TB', 0,'L');
	
	$pdf->Cell(1.25,0.2,$data->cams_id, 'TBR', 1,'L');
	
	
	$pdf->Ln();
	
	
	$pdf->SetFont('Arial','',10);
	
	$pdf->Cell(1.2,0.2,'VR District Office:','LT',0,'L');
	
	$pdf->Cell(2.3,0.2,$data->dist_office,'TR',0,'L');
	
	
	$pdf->Cell(1.0,0.2,'Provider:','LT',0,'L');
	
	$pdf->Cell(2.5,0.2,$data->provider,'TR',0,'L');
	
	$pdf->Ln();
	
	
	$pdf->Cell(1.2,0.2,'VRC Name:','LT',0,'L');
	
	$pdf->Cell(2.3,0.2,$data->vr_counselor,'TR',0,'L');
	
	
	$pdf->Cell(1.5,0.2,'NYS Fiscal System ID:','LTB',0,'L');
	
	$pdf->Cell(2.0,0.2,'1000018463','TRB',0,'L');
	
	$pdf->Ln();
	
	
	$pdf->Cell(3.5,0.2,'','LTBR',0,'L');
	
	$pdf->Cell(1.0,0.2,'Report Date:','LB',0,'L');
	
	$pdf->Cell(2.5,0.2,$_POST['8-Report_Date*'],'BR',0,'L');
	
	$pdf->Ln();
	
	// 	End of COMMON-1 Area
	// 	Start of COMMON-2a Area  slight variations between forms
	
	$pdf->Ln();
	
	
	$pdf->Cell(1.5,0.2,'Student First Name:','LTB',0,'L');
	
	$pdf->Cell(2.0,0.2,$data->stu_fname ,'TBR',0,'L');
	
	$pdf->Cell(1.5,0.2,'Student Last Name:','LTB',0,'L');
	
	$pdf->Cell(2.0,0.2,$data->stu_lname ,'TBR',0,'L');
	
	$pdf->Ln();
	
	
	$pdf->Cell(1.5,0.2,'Student Phone Number: ','LTB',0,'L');
	
	$pdf->Cell(2.0,0.2,$_POST['11-Student_Phone_Number'],'TBR',0,'L');
	
	$pdf->Cell(1.5,0.2,'Student Age: ','LTB',0,'L');
	
	$pdf->Cell(2.0,0.2,$_POST['13-Student_Age*'] ,'TBR',0,'L');
	
	$pdf->Ln();
	
	
	$pdf->Cell(2.0,0.2,'Student Email Address: ','LTB',0,'L');
	
	$pdf->Cell(5.0,0.2,$_POST['12-Student_Email_Address'],'TBR',0,'L');
	
	$pdf->Ln();
	
	
	// 	End of COMMON-2a Area
	
	// 	Start of CONTENT Area                        
	
	$pdf->Ln();
	
	$pdf->Ln();

	$pdf->SetFont('Arial','',11);
	
	$pdf->Cell(0.75,0.2,'',0,0,'C');

	$pdf->Cell(0.15,0.15,$_POST['14-Paid_Experience'] ? 'X' : ' ',1,0,'C');
	$pdf->Cell(0.35,0.2,'',0,0,'C');
	
	$pdf->Cell(3.0,0.2,'Paid Experience',0,0,'L');
	
	
	$pdf->Cell(0.15,0.15,$_POST['15-Unpaid_Experience'] ? 'X' : ' ',1,0,'C');
	$pdf->Cell(0.35,0.2,'',0,0,'C');
	
	$pdf->Cell(3.0,0.2,'Unpaid Experience',0,1,'L');
	
	$pdf->Cell(0.75,0.2,'',0,0,'C');

	$pdf->Cell(0.15,0.15,$_POST['16-Individual'] ? 'X' : ' ',1,0,'C');
	$pdf->Cell(0.35,0.2,'',0,0,'C');
	
	$pdf->Cell(3.0,0.2,'Individual',0,0,'L');
	
	
	$pdf->Cell(0.15,0.15,$_POST['17-Group'] ? 'X' : ' ',1,0,'C');
	$pdf->Cell(0.35,0.2,'',0,0,'C');
	
	$pdf->Cell(3.0,0.2,'Group',0,1,'L');

	$pdf->Ln();

	
	$pdf->SetFont('Arial','B',12);
	
	$pdf->Cell(2.5,0.2,'Start Date of Work Experience:',0,0,'L');
	
	$pdf->SetFont('Arial','',12);
	
	$pdf->Cell(4.0,0.2,$_POST['18-Start_Date_of_Work_Experience*'],0,1,'L');

	$pdf->Ln();
	
	$pdf->SetFont('Arial','B',12);
	
	$pdf->Cell(4.0,0.2,'Anticipated Completion Date of Work Experience:',0,0,'L');
	
	$pdf->SetFont('Arial','',12);
	
	$pdf->Cell(4.0,0.2,$_POST['19-Anticipated_Completion_Date_of_Work_Experience*'],0,1,'L');

	$pdf->Ln();

	$pdf->SetFont('Arial','B',12);
	
	$pdf->Cell(4.0,0.2,'Indicate Last Date of Contact if Drop Out Applies:',0,0,'L');
	
	$pdf->SetFont('Arial','',12);
	
	$pdf->Cell(4.0,0.2,$_POST['20-Indicate_Last_Date_of_Contact_if_Drop_Out_Applies'],0,1,'L');

	$pdf->Ln();

	$pdf->SetFont('Arial','B',12);
	
	$pdf->Cell(3.0,0.2,'Employer-based Work Experience Business Name and Location:',0,2,'L');
	
	$pdf->SetFont('Arial','',12);
	
	$pdf->MultiCell(6.50,0.2,$_POST['21-Employer-based_Work_Experience_Business_Name_and_Location*'], 0, 'J', 0);

	$pdf->Ln();

	$pdf->SetFont('Arial','B',12);
	
	$pdf->Cell(3.0,0.2,'Anticipated Work Experience Schedule:',0,2,'L');
	
	$pdf->SetFont('Arial','',12);
	
	$pdf->MultiCell(6.50,0.2,$_POST['22-Anticipated_Work_Experience_Schedule*'], 0, 'J', 0);

	$pdf->Ln();

	$pdf->SetFont('Arial','B',12);
	
	$pdf->Cell(3.0,0.2,'Below Describe the Work Experience in Detail',0,2,'L');
	
	$pdf->SetFont('Arial','',12);

	$pdf->MultiCell(6.50,0.2,$_POST['23-Describe_the_Work_Experience_in_Detail*'], 0, 'J', 0);

	
	$pdf->Ln();

	$pdf->SetFont('Arial','B',12);
	
	$pdf->Cell(3.0,0.2,'Please describe activities that will be completed in this work experience:',0,2,'L');
	$pdf->SetFont('Arial','',12);

	$pdf->Cell(0.15,0.15,$_POST['24-Describe_activities_that_will_be_completed_in_this_work_experience:_Workplace_Tours_/_Field_Trips'] ? 'X' : ' ',1,0,'C');
	$pdf->Cell(0.15,0.2,'',0,0,'C');
	$pdf->Cell(3.20,0.2,'Workplace Tours / Field Trips',0,2,'L');
	$pdf->Cell(4.65,0.2,'Describe:', 0, 2, 'L');
	$pdf->MultiCell(6.50,0.2,$_POST['25-Describe'], 0, 'J', 0);

	$pdf->Cell(0.15,0.15,$_POST['26-Describe_activities_that_will_be_completed_in_this_work_experience:_Job_Shadowing'] ? 'X' : ' ',1,0,'C');
	$pdf->Cell(0.15,0.2,'',0,0,'C');
	$pdf->Cell(3.20,0.2,'Job Shadowing',0,2,'L');
	$pdf->Cell(4.65,0.2,'Describe:', 0, 2, 'L');
	$pdf->MultiCell(6.50,0.2,$_POST['27-Describe'], 0, 'J', 0);

	$pdf->Cell(0.15,0.15,$_POST['28-Describe_activities_that_will_be_completed_in_this_work_experience:_Career_Mentorship'] ? 'X' : ' ',1,0,'C');
	$pdf->Cell(0.15,0.2,'',0,0,'C');
	$pdf->Cell(3.20,0.2,'Career Mentorship',0,2,'L');
	$pdf->Cell(4.65,0.2,'Describe:', 0, 2, 'L');
	$pdf->MultiCell(6.50,0.2,$_POST['29-Describe'], 0, 'J', 0);

	$pdf->Cell(0.15,0.15,$_POST['30-Describe_activities_that_will_be_completed_in_this_work_experience:_Informational_Interviews'] ? 'X' : ' ',1,0,'C');
	$pdf->Cell(0.15,0.2,'',0,0,'C');
	$pdf->Cell(3.20,0.2,'Informational Interviews',0,2,'L');
	$pdf->Cell(4.65,0.2,'Describe:', 0, 2, 'L');
	$pdf->MultiCell(6.50,0.2,$_POST['31-Describe'], 0, 'J', 0);

	$pdf->Cell(0.15,0.15,$_POST['32-Describe_activities_that_will_be_completed_in_this_work_experience:_Paid_or_Non-Paid_Internships'] ? 'X' : ' ',1,0,'C');
	$pdf->Cell(0.15,0.2,'',0,0,'C');
	$pdf->Cell(3.20,0.2,'Paid or Non-Paid Internships',0,2,'L');
	$pdf->Cell(4.65,0.2,'Describe:', 0, 2, 'L');
	$pdf->MultiCell(6.50,0.2,$_POST['33-Describe'], 0, 'J', 0);

	$pdf->Cell(0.15,0.15,$_POST['34-Describe_activities_that_will_be_completed_in_this_work_experience:_Volunteering'] ? 'X' : ' ',1,0,'C');
	$pdf->Cell(0.15,0.2,'',0,0,'C');
	$pdf->Cell(3.20,0.2,'Volunteering',0,2,'L');
	$pdf->Cell(4.65,0.2,'Describe:', 0, 2, 'L');
	$pdf->MultiCell(6.50,0.2,$_POST['35-Describe'], 0, 'J', 0);

	$pdf->Cell(0.15,0.15,$_POST['36-Describe_activities_that_will_be_completed_in_this_work_experience:_The_Importance_of_Networking'] ? 'X' : ' ',1,0,'C');
	$pdf->Cell(0.15,0.2,'',0,0,'C');
	$pdf->Cell(3.20,0.2,'The Importance of Networking',0,2,'L');
	$pdf->Cell(4.65,0.2,'Describe:', 0, 2, 'L');
	$pdf->MultiCell(6.50,0.2,$_POST['37-Describe'], 0, 'J', 0);

	$pdf->Cell(0.15,0.15,$_POST['38-Describe_activities_that_will_be_completed_in_this_work_experience:_Development_of_Introductory_Elevator_Speech_for_Networking'] ? 'X' : ' ',1,0,'C');
	$pdf->Cell(0.15,0.2,'',0,0,'C');
	$pdf->Cell(3.20,0.2,'Development of Introductory Elevator Speech for Networking',0,2,'L');
	$pdf->Cell(4.65,0.2,'Describe:', 0, 2, 'L');
	$pdf->MultiCell(6.50,0.2,$_POST['39-Describe'], 0, 'J', 0);

	$pdf->Cell(0.15,0.15,$_POST['40-Describe_activities_that_will_be_completed_in_this_work_experience:_Opportunities_to_Applying_the_Knowledge_and_Tools_Learned'] ? 'X' : ' ',1,0,'C');
	$pdf->Cell(0.15,0.2,'',0,0,'C');
	$pdf->Cell(3.20,0.2,'Opportunities to Applying the Knowledge and Tools Learned',0,2,'L');
	$pdf->Cell(4.65,0.2,'Describe:', 0, 2, 'L');
	$pdf->MultiCell(6.50,0.2,$_POST['41-Describe'], 0, 'J', 0);

	$pdf->Cell(0.15,0.15,$_POST['42-Describe_activities_that_will_be_completed_in_this_work_experience:_Career_Related_Competitions'] ? 'X' : ' ',1,0,'C');
	$pdf->Cell(0.15,0.2,'',0,0,'C');
	$pdf->Cell(3.20,0.2,'Career Related Competitions',0,2,'L');
	$pdf->Cell(4.65,0.2,'Describe:', 0, 2, 'L');
	$pdf->MultiCell(6.50,0.2,$_POST['43-Describe'], 0, 'J', 0);
	
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	
	// 	Start of FOOTER-1 Area
	
	$pdf->SetFont('Arial','B',12);
	
	$pdf->Cell(1.0,0.2,'Completed By: ', 0, 1, 'L');
	
	$pdf->SetFont('Arial','',11);
	
	$pdf->Ln();
	
	
	$pdf->Cell(4.0,0.2,'', 'B', 0, 'L');
	$pdf->Cell(0.5,0.2,'', 0, 0, 'C');
	$pdf->Cell(2.5,0.2,$_POST['44-Signature_Date'], 'B', 1, 'L');
	
	$pdf->Cell(4.0,0.2,'Signature of Evaluator', 0, 0, 'L');
	$pdf->Cell(0.5,0.2,'', 0, 0, 'C');
	$pdf->Cell(2.5,0.2,'Date', 0, 1, 'L');
	
	$pdf->Ln();
	
	
	$pdf->Cell(4.0,0.2,$_POST['45-Printed_Name*'], 'B', 0, 'L');
	$pdf->Cell(0.5,0.2,'', 0, 0, 'C');
	$pdf->Cell(2.5,0.2,$_POST['46-Title*'], 'B', 1, 'L');
	
	$pdf->Cell(4.0,0.2,'Printed Name', 0, 0, 'L');
	$pdf->Cell(0.5,0.2,'', 0, 0, 'C');
	$pdf->Cell(2.5,0.2,'Title', 0, 1, 'L');
	
	$pdf->Ln();
	
	$pdf->Cell(1.25,0.2,'Phone Number:', 0, 0, 'L');
	
	$pdf->Cell(2.75,0.2,$_POST['47-Phone_Number*'], 0, 0, 'L');
	
	$pdf->Cell(0.50,0.2,'', 0, 0, 'C');
	
	$pdf->Cell(0.50,0.2,'Email:', 0, 0, 'L');
	
	$pdf->Cell(2.00,0.2,$_POST['48-Email*'], 0, 1, 'L');
	
	$pdf->Ln();
	
	$pdf->Ln();
	
	
	$pdf->SetFont('Arial','B',12);
	
	$pdf->Cell(1.0,0.2,'Provider Supervisor: ', 0, 1, 'L');
	
	$pdf->SetFont('Arial','',11);
	
	$pdf->Ln();
	
	
	$pdf->Cell(4.0,0.2,'', 'B', 0, 'L');
	$pdf->Cell(0.5,0.2,'', 0, 0, 'C');
	$pdf->Cell(2.5,0.2,$_POST['49-Provider_Supervisor_Signature_Date'], 'B', 1, 'L');
	
	$pdf->Cell(4.0,0.2,'Signature of Evaluator II', 0, 0, 'L');
	$pdf->Cell(0.5,0.2,'', 0, 0, 'C');
	$pdf->Cell(2.5,0.2,'Date', 0, 1, 'L');
	
	$pdf->Ln();
	
	$pdf->Cell(4.0,0.2,$_POST['50-Provider_Supervisor_Printed_Name'], 'B', 0, 'L');
	$pdf->Cell(0.5,0.2,'', 0, 0, 'C');
	$pdf->Cell(2.5,0.2,$_POST['51-Provider_Supervisor_Title'], 'B', 1, 'L');
	
	$pdf->Cell(4.0,0.2,'Printed Name', 0, 0, 'L');
	$pdf->Cell(0.5,0.2,'', 0, 0, 'C');
	$pdf->Cell(2.5,0.2,'Title', 0, 1, 'L');
	
	$pdf->Ln();
	
	//=	=========================
	$pdf->Output('report.pdf', 'I');
	
}

function renderForm_559X($data) {

	$pdf = new FPDF('P', 'in', 'Letter');
	
	$pdf->SetCreator('CEO, Inc.');
	
	$pdf->SetAuthor('CEO, Inc.');
	
	$pdf->SetTitle('Report');
	
	//=	=========================
	$pdf->AddPage('P','Letter');
	
	$pdf->SetFillColor(200,200,200);
	
	$pdf->SetMargins(0.75,0.25,0.75);
	
	$pdf->Image(ACCESLOGO,3.75,0.25,1.0,1.0);
	
	$pdf->Ln(0.85);
	
	
	$pdf->SetFont('Arial','B',10);
	
	$pdf->Cell(7.0,0.2,'VR-559X',0,0,'C');
	
	$pdf->Ln();
	
	
	$pdf->SetFont('Arial', 'B', 14);
	
	$pdf->Cell(7.0,0.2,'Job Placement Services',0,0,'C');
	
	$pdf->Ln(0.3);
	
	$pdf->SetFont('Arial','B',13);
	
	$pdf->Cell(7.0,0.2,'559X-Work Experience Development',0,1,'C');
	
	$pdf->Ln(0.3);
	
	
	// 	The section below COMMON-1 is on all documents
	
	$pdf->SetFont('Arial', '', 10);
	
	$pdf->Cell(1.75,0.2,'','',0,'L');
	
	$pdf->Cell(1.25,0.2,'AV#:', 'LTB', 0, 'L');
	
	$pdf->Cell(0.75,0.2,'(7 digits)','TB', 0, 'L');
	
	$pdf->Cell(1.25,0.2,$data->av_num,'TBR', 1, 'L');
	
	
	$pdf->Cell(1.75,0.2,'','',0,'L');
	
	$pdf->Cell(1.25,0.2,'ACCES-VR ID#:','LTB',0, 'L');
	
	$pdf->Cell(0.75,0.2,'(6 digits)','TB', 0, 'L');
	
	$pdf->Cell(1.25,0.2,$data->acces_id,'TBR', 1, 'L');
	
	
	$pdf->Cell(1.75,0.2,'','',0,'L');
	
	$pdf->Cell(1.25,0.2,'CAMS ID #:', 'LTB', 0, 'L');
	
	$pdf->Cell(0.75,0.2,'(10 digits)', 'TB', 0,'L');
	
	$pdf->Cell(1.25,0.2,$data->cams_id, 'TBR', 1,'L');
	
	
	$pdf->Ln();
	
	
	$pdf->SetFont('Arial','',10);
	
	$pdf->Cell(1.2,0.2,'VR District Office:','LT',0,'L');
	
	$pdf->Cell(2.3,0.2,$data->dist_office,'TR',0,'L');
	
	
	$pdf->Cell(1.0,0.2,'Provider:','LT',0,'L');
	
	$pdf->Cell(2.5,0.2,$data->provider,'TR',0,'L');
	
	$pdf->Ln();
	
	
	$pdf->Cell(1.2,0.2,'VRC Name:','LT',0,'L');
	
	$pdf->Cell(2.3,0.2,$data->vr_counselor,'TR',0,'L');
	
	
	$pdf->Cell(1.5,0.2,'NYS Fiscal System ID:','LTB',0,'L');
	
	$pdf->Cell(2.0,0.2,'1000018463','TRB',0,'L');
	
	$pdf->Ln();
	
	
	$pdf->Cell(3.5,0.2,'','LTBR',0,'L');
	
	$pdf->Cell(1.0,0.2,'Report Date:','LB',0,'L');
	
	$pdf->Cell(2.5,0.2,$_POST['8-Report_Date*'],'BR',0,'L');
	
	$pdf->Ln();
	
	// 	End of COMMON-1 Area
	// 	Start of COMMON-2a Area  slight variations between forms
	
	$pdf->Ln();
	
	
	$pdf->Cell(1.5,0.2,'Participant First Name:','LTB',0,'L');
	
	$pdf->Cell(2.0,0.2,$_POST['9-Participant_First_Name*'] ,'TBR',0,'L');
	
	$pdf->Cell(1.5,0.2,'Participant Last Name:','LTB',0,'L');
	
	$pdf->Cell(2.0,0.2,$_POST['10-Participant_Last_Name*'],'TBR',0,'L');
	
	$pdf->Ln();
	
	
	$pdf->Cell(1.7,0.2,'Participant Phone Number: ','LTB',0,'L');
	
	$pdf->Cell(2.0,0.2,$_POST['11-Participant_Phone_Number'],'TB',0,'L');
	
	$pdf->Cell(3.3,0.2,'','TBR',0,'L');
	
	$pdf->Ln();
	
	
	$pdf->Cell(2.0,0.2,'Participant Email Address: ','LTB',0,'L');
	
	$pdf->Cell(5.0,0.2,$_POST['12-Participant_Email_Address'],'TBR',0,'L');
	
	$pdf->Ln();
	
	
	// 	End of COMMON-2a Area
	
	// 	Start of CONTENT Area                        
	
	$pdf->Ln();
	
	$pdf->Ln();


	$pdf->SetFont('Arial','B',12);
	
	$pdf->Cell(3.0,0.2,"Participant's Vocational Goal:",0,2,'L');
	
	$pdf->SetFont('Arial','',12);

	$pdf->MultiCell(6.50,0.2,$_POST["13-Participant's_Vocational_Goal*"], 0, 'J', 0);
	
	$pdf->Ln();

	$pdf->SetFont('Arial','',11);
	
	$pdf->Cell(0.75,0.2,'',0,0,'C');

	$pdf->Cell(0.15,0.15,$_POST['14-Paid_Experience'] ? 'X' : ' ',1,0,'C');
	$pdf->Cell(0.35,0.2,'',0,0,'C');
	
	$pdf->Cell(3.0,0.2,'Paid Experience',0,0,'L');
	
	
	$pdf->Cell(0.15,0.15,$_POST['15-Unpaid_Experience'] ? 'X' : ' ',1,0,'C');
	$pdf->Cell(0.35,0.2,'',0,0,'C');
	
	$pdf->Cell(3.0,0.2,'Unpaid Experience',0,1,'L');
	
	$pdf->Cell(0.75,0.2,'',0,0,'C');

	$pdf->Ln();

	
	$pdf->SetFont('Arial','B',12);
	
	$pdf->Cell(2.5,0.2,'Start Date of Work Experience:',0,0,'L');
	
	$pdf->SetFont('Arial','',12);
	
	$pdf->Cell(4.0,0.2,$_POST['16-Start_Date_of_Work_Experience*'],0,1,'L');

	$pdf->Ln();
	
	$pdf->SetFont('Arial','B',12);
	
	$pdf->Cell(4.0,0.2,'Anticipated Completion Date of Work Experience:',0,0,'L');
	
	$pdf->SetFont('Arial','',12);
	
	$pdf->Cell(4.0,0.2,$_POST['17-Anticipated_Completion_Date_of_Work_Experience*'],0,1,'L');

	$pdf->Ln();

	$pdf->SetFont('Arial','B',12);
	
	$pdf->Cell(4.0,0.2,'Indicate Last Date of Contact if Drop Out Applies:',0,0,'L');
	
	$pdf->SetFont('Arial','',12);
	
	$pdf->Cell(4.0,0.2,$_POST['18-Indicate_Last_Date_of_Contact_if_Drop_Out_Applies*'],0,1,'L');

	$pdf->Ln();

	$pdf->SetFont('Arial','B',12);
	
	$pdf->Cell(3.0,0.2,'Employer-based Work Experience Business Name and Location:',0,2,'L');
	
	$pdf->SetFont('Arial','',12);
	
	$pdf->MultiCell(6.50,0.2,$_POST['19-Employer-based_Work_Experience_Business_Name*'], 0, 'J', 0);

	$pdf->Ln();

	$pdf->SetFont('Arial','B',12);
	
	$pdf->Cell(3.0,0.2,'Work Experience Business Location:',0,2,'L');
	
	$pdf->SetFont('Arial','',12);
	
	$pdf->MultiCell(6.50,0.2,$_POST['20-Work_Experience_Business_Location*'], 0, 'J', 0);

	$pdf->Ln();

	$pdf->SetFont('Arial','B',12);
	
	$pdf->Cell(3.0,0.2,'Anticipated Work Experience Schedule:',0,2,'L');
	
	$pdf->SetFont('Arial','',12);

	$pdf->MultiCell(6.50,0.2,$_POST['21-Anticipated_Work_Experience_Schedule*'], 0, 'J', 0);

	$pdf->Ln();

	$pdf->SetFont('Arial','B',12);
	
	$pdf->Cell(3.0,0.2,'Below Describe the Work Experience in Detail (Include Job Tasks):',0,2,'L');
	
	$pdf->SetFont('Arial','',12);

	$pdf->MultiCell(6.50,0.2,$_POST['22-Below_Describe_the_Work_Experience_in_Detail_(Include_Job_Tasks)*'], 0, 'J', 0);
	
	$pdf->Ln();

	
	$pdf->Ln();
	$pdf->Ln();
	
	// 	Start of FOOTER-1 Area
	
	$pdf->SetFont('Arial','B',12);
	
	$pdf->Cell(1.0,0.2,'Completed By: ', 0, 1, 'L');
	
	$pdf->SetFont('Arial','',11);
	
	$pdf->Ln();
	
	
	$pdf->Cell(4.0,0.2,'', 'B', 0, 'L');
	$pdf->Cell(0.5,0.2,'', 0, 0, 'C');
	$pdf->Cell(2.5,0.2,$_POST['23-Signature_Date'], 'B', 1, 'L');
	
	$pdf->Cell(4.0,0.2,'Signature of Evaluator', 0, 0, 'L');
	$pdf->Cell(0.5,0.2,'', 0, 0, 'C');
	$pdf->Cell(2.5,0.2,'Date', 0, 1, 'L');
	
	$pdf->Ln();
	
	
	$pdf->Cell(4.0,0.2,$_POST['24-Printed_Name*'], 'B', 0, 'L');
	$pdf->Cell(0.5,0.2,'', 0, 0, 'C');
	$pdf->Cell(2.5,0.2,$_POST['25-Title*'], 'B', 1, 'L');
	
	$pdf->Cell(4.0,0.2,'Printed Name', 0, 0, 'L');
	$pdf->Cell(0.5,0.2,'', 0, 0, 'C');
	$pdf->Cell(2.5,0.2,'Title', 0, 1, 'L');
	
	$pdf->Ln();
	
	$pdf->Cell(1.25,0.2,'Phone Number:', 0, 0, 'L');
	
	$pdf->Cell(2.75,0.2,$_POST['26-Phone_Number*'], 0, 0, 'L');
	
	$pdf->Cell(0.50,0.2,'', 0, 0, 'C');
	
	$pdf->Cell(0.50,0.2,'Email:', 0, 0, 'L');
	
	$pdf->Cell(2.00,0.2,$_POST['27-Email*'], 0, 1, 'L');
	
	$pdf->Ln();
	
	//=	=========================
	$pdf->Output('report.pdf', 'I');
	
}

//======= Monthly Planner Calendar =======

function renderForm_MONTHLYPLANNERCALENDAR($data) {
	$pdf = new FPDF('P', 'in', 'Letter');
	//$this->load->library('Tpdf');
	
	//$pdf = new Tpdf('L', 'in', 'LEGAL', true, 'UTF-8', false);
	$pdf->SetTitle('CEO Monthly Plan');
	//$pdf->SetHeaderMargin(1.0);
	//$pdf->SetTopMargin(.5);
	//$pdf->setFooterMargin(.5);
	//$pdf->SetAutoPageBreak(true);
	//$pdf->SetAuthor('Author');
	//$pdf->SetDisplayMode('real', 'default');
	//$pdf->setPrintHeader(FALSE);
	//$pdf->setPrintFooter(FALSE);
	
	//$pdf->AddPage('L','LETTER');
	
	//$pdf->Cell(10,0,'Some sample text',1,0);
	//$pdf->Output('My-File-Name.pdf', 'I');
	
	if (is_object($data)) {
		$pdf->AddPage('L','Letter');
		$pdf->SetFillColor(200,200,200);
		// Letter in landscape 279mm width by 216mm height
		// Legal in landscape 356mm width by 216mm height
		$pdf->SetMargins(0.5,0.25);
	
		$pdf->SetTitle('Monthly Planner' );
		$pdf->SetCreator('CEO Transmetrics');
		$pdf->SetAuthor('CEO, Inc.');
	
		$pdf->Image('images/logo60.png',3.1, 0.60, 0.72 );
	
		$pdf->SetFont('Times','B',14);
		$pdf->Ln();
	
		$pdf->SetFont('Times','',9);
	
		$pdf->Cell( 2.0,0.2,'',0,0,'L');
		$pdf->Cell( 6.0,0.2,'',0,0,'C');
		$pdf->Cell( 2.0,0.2,'District / Group',0,1,'C');
	
		$pdf->SetFont('Times','B',14);
	
		$pdf->Cell( 2.0,0.2,'',0,0,'L');
		$pdf->Cell( 6.0,0.2,'Career and Employment Options, Inc.',0,0,'C');
		$pdf->SetFont('Helvetica','U',12);
		$pdf->Cell( 2.0,0.2,$_POST['districtname'],0,1,'C');
	
		$pdf->SetFont('Helvetica','',14);
		$pdf->Cell(2.0,0.2,$_POST['monthname'] . '-' . $_POST['year'],0,0,'C');
		$pdf->SetFont('Times','B',14);
		$pdf->Cell(6.0,0.2,'Monthly Planner',0,0,'C');
		$pdf->SetFont('Helvetica','U',12);
		$pdf->Cell(2.0,0.2,$_POST['name'],0,1,'C');
	
		$pdf->SetFont('Times','',14);
		$pdf->Cell(5.0,0.2,'Consultant Name: ','',0,'R');
		$pdf->Cell(5.0,0.2,$_POST['consultantname'],'',1,'L');
	
		// space between header and grid
		$pdf->Ln(0.1);

		$days = json_decode($_POST['days']);
		
		$rval = '';
	
		//This puts the day, month, and year in separate variables
		$day = 1;
		$month = intval($_POST['month']);
		$year = intval($_POST['year']);
	
		//Here we generate the first day of the month
		$first_day = mktime(0,0,0,$month, 1, $year) ;
	
		//This gets us the month name
		$title = date('F', $first_day) ;
	
		// 2 OF 5 Days of the Week
	
		//Here you find out what day of the week the first day of the month falls on
		$day_of_week = date('D', $first_day) ;
	
		//Once you know what day of the week it falls on, we know how many blank days occur before it. If the first day of the week is a
		//Sunday, then it is zero
	
		$col = 0;
		$row = 0;
	
		$dayno = 1;
	
		for ($rows = 0; $rows < 6; $rows++ ) {
			for ($cols = 0; $cols < 7; $cols++ ) {
				$calarray[$rows][$cols] = 0;
			}
		}
	
		switch($day_of_week) {
			case "Sun": $blank = 0; break;
			case "Mon": $blank = 1; break;
			case "Tue": $blank = 2; break;
			case "Wed": $blank = 3; break;
			case "Thu": $blank = 4; break;
			case "Fri": $blank = 5; break;
			case "Sat": $blank = 6; break;
		}
	
		$col = $blank;
	
		//We then determine how many days are in the current month
		$days_in_month = cal_days_in_month(0, $month, $year) ;
	
		while ($dayno <= $days_in_month) {
	
			$calarray[$row][$col] = $dayno;
			$dayno++;
			$col++;
			if ($col > 6) {
				$col = 0;
				$row++;
			}
		}
	
		// Before Drawing the Calendar, Fill an array with data from the database
	
		// 3 OF 5 Headings and Blank Days
		$pdf->SetFont('Times', '', 8);
	
		$startX = $pdf->getX();
	
		//Here you start building the table heads
		
		$pdf->Cell( 2.0,0.2,'Mon',1, 0,'C', true);
		$pdf->Cell( 2.0,0.2,'Tue',1, 0,'C', true);
		$pdf->Cell( 2.0,0.2,'Wed',1, 0,'C', true);
		$pdf->Cell( 2.0,0.2,'Thu',1, 0,'C', true);
		$pdf->Cell( 2.0,0.2,'Fri',1, 0,'C', true);            
	
		$pdf->Ln();
	
		// Draw the Array of Boxes for the Days
		$xpos = $pdf->getX();
		$ypos = $pdf->getY();
	
		for($ycnt = 0; $ycnt < 6; $ycnt++) {
			for($xcnt = 0; $xcnt < 6; $xcnt++) {  
				if ($xcnt != 0 && $xcnt != 0 ) {
					$pdf->Rect($xpos+($xcnt*2.0)-2.0,$ypos+$ycnt*1.0,2.0,1.0);
				}
			}
		}
	
		// Reset X, Y to fill the Boxes and Days
		$pdf->setX($xpos);
		$pdf->setY($ypos);
	
		$xpos = $pdf->getX();
		$ypos = $pdf->getY();
		
		/* 
		 *  Xpos should be 0.5
		 *  Ypos should be 1.49375
		 */
	
		for($ycnt = 0; $ycnt < 6; $ycnt++) {
			
			$xpos = 0.5; // reset X before looping.                
			for($xcnt = 0; $xcnt < 7; $xcnt++) {
				
				$arrayptr = 0;
				
				if ($calarray[$ycnt][$xcnt] != 0) {
					
					if ($xcnt != 0 && $xcnt != 6 ) {
					
						if (is_array($days)) {
							for ($arrayctr = 0; $arrayctr < sizeof($days); $arrayctr++) {
								if ( $days[$arrayctr]->day == $calarray[$ycnt][$xcnt] ) {
									$arrayptr = $arrayctr;
									break;
								} 
							}
	
							if ( $days[$arrayptr]->day == $calarray[$ycnt][$xcnt] ) {
								renderForm_MONTHLYPLANNERCALENDAR_PrintDay($pdf, $xpos, $ypos, $xcnt, $ycnt, $days[$arrayctr]);
							} else {
								renderForm_MONTHLYPLANNERCALENDAR_PrintEmptyDay($pdf, $xpos, $ypos, $xcnt, $ycnt, $calarray[$ycnt][$xcnt] );
							}
	
						} else {
							renderForm_MONTHLYPLANNERCALENDAR_PrintEmptyDay($pdf, $xpos, $ypos, $xcnt, $ycnt, $calarray[$ycnt][$xcnt] );
						}
					}
					
				}
				
				$xpos = $xpos+2;
				$pdf->setX($xpos);     
				
			}
			
			$ypos = $ypos+1.0;
			$pdf->setY($ypos);
		}
	
		$pdf->Output('monthlyplannercalendar.pdf', 'I');
	
	} else {
		$pdf->AddPage('L','Letter');
		$pdf->SetFillColor(200,200,200);
		$pdf->SetFont('Helvetica','B',14);
		$pdf->Cell(0,2,'No Data to Display',1,0,'C');
		$pdf->Output('monthlyplannercalendar.pdf', 'I');
	}
	
}

function renderForm_MONTHLYPLANNERCALENDAR_PrintDay($pdf, $xpos, $ypos, $col, $row, $day) {
			
	$resety = $ypos;
	
	//adjust the $xpos due to the removal of Sat/Sun
	$xpos = $xpos-2;
	$pdf->setX($xpos);
	// end of adjustment
	
	$pdf->SetFont('Times', 'BU', 8);                    
	$pdf->Cell(1.8,0.1, $day->category ,0,0,'L',false);
	$pdf->SetFont('Times', 'B', 8);                    
	$pdf->Cell(0.2,0.1, $day->day, 1, 0, 'C', true);

	$pdf->SetFont('Times', '', 8);                    
	$ypos = $ypos + 0.2;
	$pdf->setXY($xpos, $ypos);
	$pdf->Cell(2.0,0.1, $day->event,0,0,'C',false);                            

	$ypos = $ypos + 0.1;
	$pdf->setXY($xpos, $ypos);
	$pdf->Cell(2.0,0.1, $day->location,0,0,'C',false);                            

	$ypos = $ypos + 0.1;
	$pdf->setXY($xpos, $ypos);
	$pdf->Cell(2.0,0.1, $day->location2,0,0,'C',false);                            

	$ypos = $ypos + 0.1;
	$pdf->setXY($xpos, $ypos);
	$pdf->Cell(2.0,0.1, $day->contact->name,0,0,'C',false);                            

	$ypos = $ypos + 0.1;
	$pdf->setXY($xpos, $ypos);
	$pdf->Cell(2.0,0.1, $day->contact->phone,0,0,'C',false);                            

	$ypos = $ypos + 0.1;
	$pdf->setXY($xpos, $ypos);
	$pdf->Cell(2.0,0.1, $day->times,0,0,'C',false); 
	$ypos = $resety;
	$pdf->setY($ypos);                    
	
}

function renderForm_MONTHLYPLANNERCALENDAR_PrintEmptyDay($pdf, $xpos, $ypos, $col, $row, $nday) {
        
	$resety = $ypos;
	
	//adjust the $xpos due to the removal of Sat/Sun
	$xpos = $xpos-2;
	$pdf->setX($xpos);
	// end of adjustment        
	
	$pdf->SetFont('Times', 'BU', 8);                    
	$pdf->Cell(1.8,0.1, '' ,0,0,'L',false);
	$pdf->SetFont('Times', 'B', 8);                    
	$pdf->Cell(0.2,0.1, $nday, 1, 0, 'C', true);

	$pdf->SetFont('Times', '', 8);                    
			
	$ypos = $resety;
	$pdf->setY($ypos);                    
	
}

function renderForm_921X($data) {
	
	$pdf = new FPDF('P', 'in', 'Letter');

	$pdf->SetCreator('CEO, Inc.');
	
	$pdf->SetAuthor('CEO, Inc.');
	
	$pdf->SetTitle('Report');
	
	//=	=========================
	$pdf->AddPage('P','Letter');
	
	$pdf->SetFillColor(200,200,200);
	
	$pdf->SetMargins(0.75,0.25,0.75);
	
	
	$pdf->Image(ACCESLOGO,3.75,0.25,1.0,1.0);
	
	$pdf->Ln(0.85);
	
	
	$pdf->SetFont('Arial','B',10);
	
	$pdf->Cell(7.0,0.2,'VR-921X',0,0,'C');
	
	$pdf->Ln();
	
	
	$pdf->SetFont('Arial', 'B', 14);
	
	$pdf->Cell(7.0,0.2,'Job Placement Services',0,0,'C');
	
	$pdf->Ln(0.3);
	
	$pdf->SetFont('Arial','B',13);
	
	$pdf->Cell(7.0,0.2,'921X - Direct Placement Intake',0,1,'C');
	
	$pdf->Ln(0.3);
	
	
	// 	The section below COMMON-1 is on all documents
	
	$pdf->SetFont('Arial', '', 10);
	
	$pdf->Cell(1.75,0.2,'','',0,'L');
	
	$pdf->Cell(1.25,0.2,'AV#:', 'LTB', 0, 'L');
	
	$pdf->Cell(0.75,0.2,'(7 digits)','TB', 0, 'L');
	
	$pdf->Cell(1.25,0.2,$data->av_num,'TBR', 1, 'L');
	
	
	$pdf->Cell(1.75,0.2,'','',0,'L');
	
	$pdf->Cell(1.25,0.2,'ACCES-VR ID#:','LTB',0, 'L');
	
	$pdf->Cell(0.75,0.2,'(6 digits)','TB', 0, 'L');
	
	$pdf->Cell(1.25,0.2,$data->acces_id,'TBR', 1, 'L');
	
	
	$pdf->Cell(1.75,0.2,'','',0,'L');
	
	$pdf->Cell(1.25,0.2,'CAMS ID #:', 'LTB', 0, 'L');
	
	$pdf->Cell(0.75,0.2,'(10 digits)', 'TB', 0,'L');
	
	$pdf->Cell(1.25,0.2,$data->cams_id, 'TBR', 1,'L');
	
	
	$pdf->Ln();
	
	
	$pdf->SetFont('Arial','',10);
	
	$pdf->Cell(1.2,0.2,'VR District Office:','LT',0,'L');
	
	$pdf->Cell(2.3,0.2,$data->dist_office,'TR',0,'L');
	
	
	$pdf->Cell(1.0,0.2,'Provider:','LT',0,'L');
	
	$pdf->Cell(2.5,0.2,$data->provider,'TR',0,'L');
	
	$pdf->Ln();
	
	
	$pdf->Cell(1.2,0.2,'VRC Name:','LT',0,'L');
	
	$pdf->Cell(2.3,0.2,$data->vr_counselor,'TR',0,'L');
	
	
	$pdf->Cell(1.5,0.2,'NYS Fiscal System ID:','LTB',0,'L');
	
	$pdf->Cell(2.0,0.2,'1000018463','TRB',0,'L');
	
	$pdf->Ln();
	
	
	$pdf->Cell(3.5,0.2,'','LTBR',0,'L');
	
	$pdf->Cell(1.0,0.2,'Report Date:','LB',0,'L');
	
	$pdf->Cell(2.5,0.2,$_POST['8-Report_Date'],'BR',0,'L');
	
	$pdf->Ln();
	
	// 	End of COMMON-1 Area
	// 	Start of COMMON-2a Area  slight variations between forms
	
	$pdf->Ln();
	
	
	$pdf->Cell(1.5,0.2,'Participant First Name:','LTB',0,'L');
	
	$pdf->Cell(2.0,0.2,$_POST['10-Participant_First_Name*'] ,'TBR',0,'L');
	
	$pdf->Cell(1.5,0.2,'Participant Last Name:','LTB',0,'L');
	
	$pdf->Cell(2.0,0.2,$_POST['11-Participant_Last_Name*'],'TBR',0,'L');
	
	$pdf->Ln();
	
	
	$pdf->Cell(1.5,0.2,'Participant Phone Number: ','LTB',0,'L');
	
	$pdf->Cell(2.0,0.2,$_POST['12-Participant_Phone_Number'],'TBR',0,'L');
	
	$pdf->Cell(1.5,0.2,'','LTB',0,'L');
	
	$pdf->Cell(2.0,0.2,'','TBR',0,'L');
	
	$pdf->Ln();
	
	
	$pdf->Cell(2.0,0.2,'Participant Email Address: ','LTB',0,'L');
	
	$pdf->Cell(5.0,0.2,$_POST['13-Participant_Email_Address'],'TBR',0,'L');
	
	$pdf->Ln();
	
	$pdf->Ln();
	
	$pdf->Ln();
	
	// 	End of COMMON-2a Area
	
	// 	Start of CONTENT Area
	
	
	$pdf->SetFont('Arial','B',13);
	
	$pdf->Cell(2.5,0.2,'Intake/Initial Assessment',0,0,'L');
	
	$pdf->SetFont('Arial','',11);
	
	//$	pdf->Cell(0.4,0.2,'',0,0,'L');

	$pdf->Ln();
	$pdf->Ln();




	$pdf->Cell(4.0,0.2,'1.   Is the provider able to assist the participant in',0,0,'L');
	
	$pdf->SetFont('Arial','',12);
	
	$pdf->Cell(0.15,0.15, $_POST['14-Is_the_provider_able_to_assist_the_participant_in_finding_employment:_Yes'] ? 'X' : ' ',1,0,'C');
	
	$pdf->Cell(0.2,0.2,'',0,0,'L');
	
	$pdf->Cell(0.5,0.2,'Yes',0,0,'L');
	
	$pdf->Cell(0.15,0.15, $_POST['15-Is_the_provider_able_to_assist_the_participant_in_finding_employment:_No'] ? 'X' : ' ',1,0,'C');

	$pdf->Cell(0.2,0.2,'',0,0,'L');
	
	$pdf->Cell(2.0,0.2,'No',0,0,'L');
	
	$pdf->Cell(0.3,0.2,'',0,1,'C');
	$pdf->Cell(3.5,0.2,'      finding employment?',0,0,'L');
	$pdf->Cell(0.3,0.2,'',0,1,'C');
	$pdf->Cell(7.0,0.2,"      Please explain:",0,1,'L');
	
	$pdf->SetFont('Arial','',11);
	
	$pdf->MultiCell(7.0,0.2, $_POST["16-Please_explain*"],0,'j', 0);



	$pdf->Ln();
	$pdf->SetFont('Arial','',12);
	$pdf->Cell(7.0,0.2,"2.   Please comment on appropriateness of vocational goal, assets/barriers, job",0,1,'L');
	$pdf->Cell(7.0,0.2,"      search methodologies, mutual expectations, willingness to work and",0,1,'L');
	$pdf->Cell(7.0,0.2,"      reasonable expectations that job development will be successful.",0,1,'L');
	$pdf->SetFont('Arial','',11);
	$pdf->MultiCell(7.0,0.2, $_POST["17-Please_comment_on_appropriateness_of_vocational_goal,_assets/barriers,_job_search_methodologies,_mutual_expectations,_willingness_to_work_and_reasonable_expectations_that_job_development_will_be_successful*"],0,'j', 0);

	$pdf->Ln();

	$pdf->SetFont('Arial','',12);
	$pdf->Cell(4.0,0.2,'3.   Commence Job Development:',0,0,'L');
	
	$pdf->Cell(0.15,0.15, $_POST['18-Commence_Job_Development:_Yes'] ? 'X' : ' ',1,0,'C');
	
	$pdf->Cell(0.2,0.2,'',0,0,'L');
	
	$pdf->Cell(0.5,0.2,'Yes',0,0,'L');
	
	$pdf->Cell(0.15,0.15, $_POST['19-Commence_Job_Development:_No'] ? 'X' : ' ',1,0,'C');

	$pdf->Cell(0.2,0.2,'',0,0,'L');
	
	$pdf->Cell(2.0,0.2,'No',0,0,'L');
	
	$pdf->Cell(0.3,0.2,'',0,1,'C');
	$pdf->Cell(2.0,0.2,'      Date of Next Service: ',0,0,'L');
	$pdf->Cell(2.0,0.2,$_POST["20-Date_of_Next_Service*"],0,1,'L');


	$pdf->Ln();
	$pdf->SetFont('Arial','',12);
	$pdf->Cell(7.0,0.2,"4.   Describe Next Steps:",0,1,'L');
	$pdf->SetFont('Arial','',11);
	$pdf->MultiCell(7.0,0.2, $_POST["21-Describe_Next_Steps*"],0,'j', 0);
	
	// 	Start of FOOTER-1 Area
	$pdf->Ln();
	
	
	$pdf->SetFont('Arial','B',12);
	
	$pdf->Cell(1.0,0.2,'Completed By: ', 0, 1, 'L');
	
	$pdf->SetFont('Arial','',11);
	
	$pdf->Ln();
	
	
	$pdf->Cell(4.0,0.2,'', 'B', 0, 'L');
	$pdf->Cell(0.5,0.2,'', 0, 0, 'C');
	$pdf->Cell(2.5,0.2,$_POST['22-Signature_Date'], 'B', 1, 'L');
	
	$pdf->Cell(4.0,0.2,'Qualified Staff Signature', 0, 0, 'L');
	$pdf->Cell(0.5,0.2,'', 0, 0, 'C');
	$pdf->Cell(2.5,0.2,'Date', 0, 1, 'L');
	
	$pdf->Ln();
	
	
	$pdf->Cell(4.0,0.2,$_POST['23-Printed_Name*'], 'B', 0, 'L');
	$pdf->Cell(0.5,0.2,'', 0, 0, 'C');
	$pdf->Cell(2.5,0.2,$_POST['24-Title*'], 'B', 1, 'L');
	
	$pdf->Cell(4.0,0.2,'Printed Name', 0, 0, 'L');
	$pdf->Cell(0.5,0.2,'', 0, 0, 'C');
	$pdf->Cell(2.5,0.2,'Title', 0, 1, 'L');
	
	$pdf->Ln();
	
	$pdf->Cell(1.25,0.2,'Phone Number:', 0, 0, 'L');
	
	$pdf->Cell(2.75,0.2,$_POST['25-Phone_Number*'], 0, 0, 'L');
	
	$pdf->Cell(0.50,0.2,'', 0, 0, 'C');
	
	$pdf->Cell(0.50,0.2,'Email:', 0, 0, 'L');
	
	$pdf->Cell(2.00,0.2,$_POST['26-Email*'], 0, 1, 'L');
	
	$pdf->Ln();
	
	$pdf->Ln();
	
	//=	=========================
	$pdf->Output('report.pdf', 'I');
	
}

//======= End Monthly Planner Calendar =======