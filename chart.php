<?php 
require_once ('jpgraph/jpgraph.php'); 
require_once ('jpgraph/jpgraph_pie.php'); 
require_once ('jpgraph/jpgraph_pie3d.php'); 

  // Browser usage statistics, %
 $data = array(40,60,21,33);
 $leg = array("a","b","c","d");
 
$graph = new PieGraph(600,400);
$graph->SetShadow();
 
$graph->title->Set("A simple Pie plot");
 
$p1 = new PiePlot($data);
$p1->SetLabelType(PIE_VALUE_ABS);
$p1->SetSliceColors(array('green','blue','red','yellow'));
$p1->SetLegends($leg);
$graph->Add($p1);
$graph->Stroke();

?>