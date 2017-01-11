<?php
    $conexion = new mysqli('localhost','root','Cable2016','test',3306);
	if (mysqli_connect_errno()) {
    	printf("La conexión con el servidor de base de datos falló: %s\n", mysqli_connect_error());
    	exit();
	}

	$consulta = "SELECT * FROM seguimiento";
	$resultado = $conexion->query($consulta);
	if($resultado->num_rows > 0 ){
						
		date_default_timezone_set('America/Mexico_City');

		if (PHP_SAPI == 'cli')
			die('Este archivo solo se puede ver desde un navegador web');

		/** Se agrega la libreria PHPExcel */
		require_once 'lib/PHPExcel/PHPExcel.php';

		// Se crea el objeto PHPExcel
		$objPHPExcel = new PHPExcel();

		// Se asignan las propiedades del libro
		$objPHPExcel->getProperties()->setCreator("Codedrinks") //Autor
							 ->setLastModifiedBy("Codedrinks") //Ultimo usuario que lo modificó
							 ->setTitle("Reporte Excel con PHP y MySQL")
							 ->setSubject("Reporte Excel con PHP y MySQL")
							 ->setDescription("Reporte")
							 ->setKeywords("reporte")
							 ->setCategory("Reporte excel");

		$tituloReporte = "Reporte General";
		$titulosColumnas = array('RF', 'CODIGO ALARMA', 'ACTIVO', 'DESCRIPCION','REFERENCIA','SERIE','FALLA','FABRICANTE','PROVEEDOR','FECHA','RESULTADO','MES');
		$objPHPExcel->setActiveSheetIndex(0)
        		    ->mergeCells('A1:L1');
						
		// Se agregan los titulos del reporte
		$objPHPExcel->setActiveSheetIndex(0)
					->setCellValue('A1',$tituloReporte)
        		    ->setCellValue('A3',  $titulosColumnas[0])
		            ->setCellValue('B3',  $titulosColumnas[1])
        		    ->setCellValue('C3',  $titulosColumnas[2])
            		->setCellValue('D3',  $titulosColumnas[3])
            		->setCellValue('E3',  $titulosColumnas[4])
            		->setCellValue('F3',  $titulosColumnas[5])
		            ->setCellValue('G3',  $titulosColumnas[6])
        		    ->setCellValue('H3',  $titulosColumnas[7])
            		->setCellValue('I3',  $titulosColumnas[8])
            		->setCellValue('J3',  $titulosColumnas[9])
            		->setCellValue('K3',  $titulosColumnas[10])
		            ->setCellValue('L3',  $titulosColumnas[11]);
		
		//Se agregan los datos de los alumnos
		$i = 4;
		while ($fila = $resultado->fetch_array()) {
			$objPHPExcel->setActiveSheetIndex(0)
        		    ->setCellValue('A'.$i,  $fila['RF'])
		            ->setCellValue('B'.$i,  $fila['codigoalarma'])
        		    ->setCellValue('C'.$i,  $fila['Activo'])
            		->setCellValue('D'.$i,  $fila['Descripción'])
     				->setCellValue('E'.$i,  $fila['Referencia'])
		            ->setCellValue('F'.$i,  $fila['Serie'])
        		    ->setCellValue('G'.$i,  $fila['Falla'])
            		->setCellValue('H'.$i,  $fila['Fabricante'])
            		->setCellValue('I'.$i,  $fila['Proveedor'])
		            ->setCellValue('J'.$i,  $fila['Fecha'])
        		    ->setCellValue('K'.$i,  $fila['Resultado'])
            		->setCellValue('L'.$i,  $fila['MES']);
					$i++;
		}
		
		$estiloTituloReporte = array(
        	'font' => array(
	        	'name'      => 'Verdana',
    	        'bold'      => true,
        	    'italic'    => false,
                'strike'    => false,
               	'size' =>16,
	            	'color'     => array(
    	            	'rgb' => 'FFFFFF'
        	       	)
            ),
	        'fill' => array(
				'type'	=> PHPExcel_Style_Fill::FILL_SOLID,
				'color'	=> array('argb' => 'FF220835')
			),
            'borders' => array(
               	'allborders' => array(
                	'style' => PHPExcel_Style_Border::BORDER_NONE                    
               	)
            ), 
            'alignment' =>  array(
        			'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        			'vertical'   => PHPExcel_Style_Alignment::VERTICAL_CENTER,
        			'rotation'   => 0,
        			'wrap'          => TRUE
    		)
        );

		$estiloTituloColumnas = array(
            'font' => array(
                'name'      => 'Arial',
                'bold'      => true,                          
                'color'     => array(
                    'rgb' => 'FFFFFF'
                )
            ),
            'fill' 	=> array(
				'type'		=> PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR,
				'rotation'   => 90,
        		'startcolor' => array(
            		'rgb' => 'c47cf2'
        		),
        		'endcolor'   => array(
            		'argb' => 'FF431a5d'
        		)
			),
            'borders' => array(
            	'top'     => array(
                    'style' => PHPExcel_Style_Border::BORDER_MEDIUM ,
                    'color' => array(
                        'rgb' => '143860'
                    )
                ),
                'bottom'     => array(
                    'style' => PHPExcel_Style_Border::BORDER_MEDIUM ,
                    'color' => array(
                        'rgb' => '143860'
                    )
                )
            ),
			'alignment' =>  array(
        			'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        			'vertical'   => PHPExcel_Style_Alignment::VERTICAL_CENTER,
        			
        			
    		));
			
		$estiloInformacion = new PHPExcel_Style();
		$estiloInformacion->applyFromArray(
			array(
           		'font' => array(
               	'name'      => 'Arial',               
               	'color'     => array(
                   	'rgb' => '000000'
               	)
           	),
           	'fill' 	=> array(
				'type'		=> PHPExcel_Style_Fill::FILL_SOLID,
				'color'		=> array('argb' => 'FFd9b7f4')
			),
           	'borders' => array(
               	'left'     => array(
                   	'style' => PHPExcel_Style_Border::BORDER_THIN ,
	                'color' => array(
    	            	'rgb' => '3a2a47'
                   	)
               	)             
           	)
        ));
		 
		$objPHPExcel->getActiveSheet()->getStyle('A1:L1')->applyFromArray($estiloTituloReporte);
		$objPHPExcel->getActiveSheet()->getStyle('A3:L3')->applyFromArray($estiloTituloColumnas);		
		$objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "A4:L".($i-1));
				
		for($i = 'A'; $i <= 'L'; $i++){
			$objPHPExcel->setActiveSheetIndex(0)			
				->getColumnDimension($i)->setAutoSize(TRUE);
		}
		
		// Se asigna el nombre a la hoja
		$objPHPExcel->getActiveSheet(0)->setTitle('Reporte General');
		$objPHPExcel->getActiveSheet(0)->setAutoFilter('A3:L3');
		// Se activa la hoja para que sea la que se muestre cuando el archivo se abre
		$objPHPExcel->setActiveSheetIndex(0);
		// Inmovilizar paneles 
		//$objPHPExcel->getActiveSheet(0)->freezePane('A4');
		$objPHPExcel->getActiveSheet(0)->freezePaneByColumnAndRow(0,4);
//-------------------------------HOJA 2------------------------------------
		$objPHPExcel->createSheet(1);
		$consulta1 = "SELECT Fabricante, count(*) from seguimiento group by Fabricante";
        $resultado1 = $conexion->query($consulta1);
        require_once 'lib/PHPExcel/PHPExcel.php';
       
        
        $tituloReporte1 = "FALLA POR MARCA";
        $titulosColumnas1 = array('Marca','Total');
        $objPHPExcel->setActiveSheetIndex(1)
                    ->mergeCells('A1:B1');
        $objPHPExcel->setActiveSheetIndex(1)
                    ->setCellValue('A1',$tituloReporte1)
                    ->setCellValue('A3',  $titulosColumnas1[0])
                    ->setCellValue('B3',  $titulosColumnas1[1]);
        
        $i = 4;
        while ($fila = $resultado1->fetch_array()) {
            $objPHPExcel->setActiveSheetIndex(1)
                    ->setCellValue('A'.$i,  $fila['Fabricante'])
                    ->setCellValue('B'.$i,  $fila['count(*)']);
                   
                    $i++;
        }
$objWorksheet = $objPHPExcel->getActiveSheet();



$dataseriesLabels = array(
    new PHPExcel_Chart_DataSeriesValues('String', 'Worksheet!$B$1', NULL, 1),   //  FALLA
);
$xAxisTickValues = array(
    new PHPExcel_Chart_DataSeriesValues('String', 'Worksheet!$A$4:$A$9', NULL, 4),
);
$dataSeriesValues = array(
    new PHPExcel_Chart_DataSeriesValues('Number', 'Worksheet!$B$4:$B$9', NULL, 4),
);
$series = new PHPExcel_Chart_DataSeries(
    PHPExcel_Chart_DataSeries::TYPE_BARCHART,       // plotType
    PHPExcel_Chart_DataSeries::GROUPING_STANDARD,   // plotGrouping
    range(0, count($dataSeriesValues)-1),           // plotOrder
    $dataseriesLabels,                              // plotLabel
    $xAxisTickValues,                               // plotCategory
    $dataSeriesValues                               // plotValues
);
$series->setPlotDirection(PHPExcel_Chart_DataSeries::DIRECTION_COL);

//  Set the series in the plot area
$plotarea = new PHPExcel_Chart_PlotArea(NULL, array($series));
//  Set the chart legend
$legend = new PHPExcel_Chart_Legend(PHPExcel_Chart_Legend::POSITION_RIGHT, NULL, false);

$title = new PHPExcel_Chart_Title('Fallas MARCA');
$yAxisLabel = new PHPExcel_Chart_Title('Fallas');
$chart = new PHPExcel_Chart(
    'chart1',       // name
    $title,         // title
    $legend,        // legend
    $plotarea,      // plotArea
    true,           // plotVisibleOnly
    0,              // displayBlanksAs
    NULL,           // xAxisLabel
    $yAxisLabel     // yAxisLabel
);

//  Set the position where the chart should appear in the worksheet
$chart->setTopLeftPosition('A11');
$chart->setBottomRightPosition('H20');

//  Add the chart to the worksheet
$objWorksheet->addChart($chart);


//------------------------

		//$objPHPExcel->getActiveSheet()->setTitle('Reporte Fallas Marca');
		$objPHPExcel->getActiveSheet(1)->setAutoFilter('A3:B3');

		// Se manda el archivo al navegador web, con el nombre que se indica (Excel2007)
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="Reporte.xlsx"');
		header('Cache-Control: max-age=0');
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		$objWriter->setIncludeCharts(TRUE);
		$objWriter->save('php://output');
		exit;
		
	}
	else{
		print_r('No hay resultados para mostrar');
	}
?>