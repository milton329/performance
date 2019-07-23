<script type="text/javascript">        
        function main(container)
        {
            if (!mxClient.isBrowserSupported())
            {
                mxUtils.error('Browser is not supported!', 200, false);
            }
            else
            {
                mxConstants.SHADOWCOLOR = '#e0e0e0';
                
                var graph = createGraph(container);

var xml = '<mxGraphModel><root><mxCell id="0"/><mxCell id="1" parent="0"/>'+
          '<mxCell id="2" value="Balanced Scorecard" style="swimlane" vertex="1" parent="1"><mxGeometry x="1" width="850" height="400" as="geometry"/></mxCell>'+

'<mxCell id="3" value="Financiero" style="swimlane" vertex="1" parent="2"><mxGeometry x="30" width="820" height="100" as="geometry"/></mxCell>'+
<?php 
$num=90; $id=15; $num2=40;
            $sql = "SELECT * FROM objetivos where grupo='Financiero'";            
            $objetivos = $oGlobals->verPorConsultaPor($sql, 1);
            foreach($objetivos as $objetivo){
            $id2=$objetivo["id"]+10;
?>
'<mxCell id="<?= $objetivo["nombre"].$id;?>" value="<?= utf8_encode($objetivo["nombre"]);?>" vertex="1" parent="3"><mxGeometry x="<?= $num;?>" y="30" width="100" height="40" as="geometry"/></mxCell>'+    
'<mxCell id="<?= $id;?>" value="" style="start" vertex="1" parent="3"><mxGeometry x="<?= $num2;?>" y="35" width="30" height="30" as="geometry"/></mxCell>'+
<?php
$id=$id+1; $num=$num+160; $num2=$num2+162; 
} 
?>                 
'<mxCell id="4" value="Clientes" style="swimlane" vertex="1" parent="2"><mxGeometry x="30" y="100" width="820" height="100" as="geometry"/></mxCell>'+
<?php 
$num=90; $id=30; $num2=40;
            $sql = "SELECT * FROM objetivos where grupo='Clientes'";            
            $objetivos = $oGlobals->verPorConsultaPor($sql, 1);
            foreach($objetivos as $objetivo){
            $id2=$objetivo["id"]+10;
?>
'<mxCell id="<?= $objetivo["nombre"].$id;?>" value="<?= utf8_encode($objetivo["nombre"]);?>" vertex="1" parent="3"><mxGeometry x="<?= $num;?>" y="130" width="100" height="40" as="geometry"/></mxCell>'+    
'<mxCell id="<?= $id;?>" value="" style="start" vertex="1" parent="3"><mxGeometry x="<?= $num2;?>" y="135" width="30" height="30" as="geometry"/></mxCell>'+
<?php
$id=$id+1; $num=$num+160; $num2=$num2+162; 
} 
?>
'<mxCell id="5" value="Procesos" style="swimlane" vertex="1" parent="2"><mxGeometry x="30" y="200" width="820" height="100" as="geometry"/></mxCell>'+
<?php 
$num=90; $id=45; $num2=40;
            $sql = "SELECT * FROM objetivos where grupo='Procesos'";            
            $objetivos = $oGlobals->verPorConsultaPor($sql, 1);
            foreach($objetivos as $objetivo){
            $id2=$objetivo["id"]+10;
?>
'<mxCell id="<?= $objetivo["nombre"].$id;?>" value="<?= utf8_encode($objetivo["nombre"]);?>" vertex="1" parent="3"><mxGeometry x="<?= $num;?>" y="230" width="100" height="40" as="geometry"/></mxCell>'+    
'<mxCell id="<?= $id;?>" value="" style="start" vertex="1" parent="3"><mxGeometry x="<?= $num2;?>" y="235" width="30" height="30" as="geometry"/></mxCell>'+
<?php
$id=$id+1; $num=$num+160; $num2=$num2+162; 
} 
?>
'<mxCell id="6" value="Personal" style="swimlane" vertex="1" parent="2"><mxGeometry x="30" y="300" width="820" height="100" as="geometry"/></mxCell>'+
<?php 
$num=90; $id=60; $num2=40;
            $sql = "SELECT * FROM objetivos where grupo='Personal'";            
            $objetivos = $oGlobals->verPorConsultaPor($sql, 1);
            foreach($objetivos as $objetivo){
            $id2=$objetivo["id"]+10;
?>
'<mxCell id="<?= $objetivo["nombre"].$id;?>" value="<?= utf8_encode($objetivo["nombre"]);?>" vertex="1" parent="3"><mxGeometry x="<?= $num;?>" y="330" width="100" height="40" as="geometry"/></mxCell>'+    
'<mxCell id="<?= $id;?>" value="" style="start" vertex="1" parent="3"><mxGeometry x="<?= $num2;?>" y="335" width="30" height="30" as="geometry"/></mxCell>'+
<?php
$id=$id+1; $num=$num+160; $num2=$num2+162; 
} 
?>








                    '</root></mxGraphModel>';
                var doc = mxUtils.parseXml(xml);
                var codec = new mxCodec(doc);
                codec.decode(doc.documentElement, graph.getModel());
            }
            
            document.body.appendChild(mxUtils.button('Update', function(evt)
            {
                 var xml = '<process><update id="ApproveClaim" state="'+getState()+'"/><update id="AuthorizeClaim" state="'+getState()+'"/>'+
                    '<update id="CheckAccountingData" state="'+getState()+'"/><update id="ReviewClaim" state="'+getState()+'"/>'+
                    '<update id="ApproveReviewedClaim" state="'+getState()+'"/><update id="EnterAccountingData" state="'+getState()+'"/></process>';
                update(graph, xml);
            }));
        };

        function update(graph, xml)
        {
            if (xml != null && xml.length > 0)
            {
                var doc = mxUtils.parseXml(xml);
                
                if (doc != null && doc.documentElement != null)
                {
                    var model = graph.getModel();
                    var nodes = doc.documentElement.getElementsByTagName('update');
                    
                    if (nodes != null && nodes.length > 0)
                    {
                        model.beginUpdate();

                        try
                        {
                            for (var i = 0; i < nodes.length; i++)
                            {
                                // Processes the activity nodes inside the process node
                                var id = nodes[i].getAttribute('id');
                                var state = nodes[i].getAttribute('state');
                                
                                // Gets the cell for the given activity name from the model
                                var cell = model.getCell(id);
                                
                                // Updates the cell color and adds some tooltip information
                                if (cell != null)
                                {
                                    // Resets the fillcolor and the overlay
                                    graph.setCellStyles(mxConstants.STYLE_FILLCOLOR, 'white', [cell]);
                                    graph.removeCellOverlays(cell);
            
                                    // Changes the cell color for the known states
                                    if (state == 'Running')
                                    {
                                        graph.setCellStyles(mxConstants.STYLE_FILLCOLOR, '#f8cecc', [cell]);
                                    }
                                    else if (state == 'Waiting')
                                    {
                                        graph.setCellStyles(mxConstants.STYLE_FILLCOLOR, '#fff2cc', [cell]);
                                    }
                                    else if (state == 'Completed')
                                    {
                                        graph.setCellStyles(mxConstants.STYLE_FILLCOLOR, '#d4e1f5', [cell]);
                                    }
                                    
                                    // Adds tooltip information using an overlay icon
                                    if (state != 'Init')
                                    {
                                        // Sets the overlay for the cell in the graph
                                        graph.addCellOverlay(cell, createOverlay(graph.warningImage, 'State: '+state));
                                    }
                                }
                            } // for
                        }
                        finally
                        {
                            model.endUpdate();
                        }
                    }
                }
            }
        };
        
        /**
         * Creates an overlay object using the given tooltip and text for the alert window
         * which is being displayed on click.
         */
        function createOverlay(image, tooltip)
        {
            var overlay = new mxCellOverlay(image, tooltip);

            // Installs a handler for clicks on the overlay
            overlay.addListener(mxEvent.CLICK, function(sender, evt)
            {
                mxUtils.alert(tooltip + '\nLast update: ' + new Date());
            });
            
            return overlay;
        };
        
        /**
         * Creates and returns an empty graph inside the given container.
         */
        function createGraph(container)
        {
            var graph = new mxGraph(container);
            graph.setTooltips(true);
            graph.setEnabled(false);
            
            // Disables folding
            graph.isCellFoldable = function(cell, collapse)
            {
                return false;
            };

            // Creates the stylesheet for the process display
            var style = graph.getStylesheet().getDefaultVertexStyle();
            style[mxConstants.STYLE_FONTSIZE] = 11;
            style[mxConstants.STYLE_FONTCOLOR] = 'black';
            style[mxConstants.STYLE_STROKECOLOR] = '#808080';
            style[mxConstants.STYLE_FILLCOLOR] = 'white';
            style[mxConstants.STYLE_GRADIENTCOLOR] = 'white';
            style[mxConstants.STYLE_GRADIENT_DIRECTION] = mxConstants.DIRECTION_EAST;
            style[mxConstants.STYLE_ROUNDED] = true;
            style[mxConstants.STYLE_SHADOW] = true;
            style[mxConstants.STYLE_FONTSTYLE] = 1;
            
            style = graph.getStylesheet().getDefaultEdgeStyle();
            style[mxConstants.STYLE_EDGE] = mxEdgeStyle.ElbowConnector;
            style[mxConstants.STYLE_STROKECOLOR] = '#808080';
            style[mxConstants.STYLE_ROUNDED] = true;
            style[mxConstants.STYLE_SHADOW] = true;
                            
            style = [];
            style[mxConstants.STYLE_SHAPE] = mxConstants.SHAPE_SWIMLANE;
            style[mxConstants.STYLE_PERIMETER] = mxPerimeter.RectanglePerimeter;
            style[mxConstants.STYLE_STROKECOLOR] = '#a0a0a0';
            style[mxConstants.STYLE_FONTCOLOR] = '#606060';
            style[mxConstants.STYLE_FILLCOLOR] = '#E0E0DF';
            style[mxConstants.STYLE_GRADIENTCOLOR] = 'white';
            style[mxConstants.STYLE_STARTSIZE] = 30;
            style[mxConstants.STYLE_ROUNDED] = false;
            style[mxConstants.STYLE_FONTSIZE] = 12;
            style[mxConstants.STYLE_FONTSTYLE] = 0;
            style[mxConstants.STYLE_HORIZONTAL] = false;
            // To improve text quality for vertical labels in some old IE versions...
            style[mxConstants.STYLE_LABEL_BACKGROUNDCOLOR] = '#efefef';

            graph.getStylesheet().putCellStyle('swimlane', style);
            
            style = [];
            style[mxConstants.STYLE_SHAPE] = mxConstants.SHAPE_RHOMBUS;
            style[mxConstants.STYLE_PERIMETER] = mxPerimeter.RhombusPerimeter;
            style[mxConstants.STYLE_STROKECOLOR] = '#91BCC0';
            style[mxConstants.STYLE_FONTCOLOR] = 'gray';
            style[mxConstants.STYLE_FILLCOLOR] = '#91BCC0';
            style[mxConstants.STYLE_GRADIENTCOLOR] = 'white';
            style[mxConstants.STYLE_ALIGN] = mxConstants.ALIGN_CENTER;
            style[mxConstants.STYLE_VERTICAL_ALIGN] = mxConstants.ALIGN_MIDDLE;
            style[mxConstants.STYLE_FONTSIZE] = 16;
            graph.getStylesheet().putCellStyle('step', style);
            
            style = [];
            style[mxConstants.STYLE_SHAPE] = mxConstants.SHAPE_ELLIPSE;
            style[mxConstants.STYLE_PERIMETER] = mxPerimeter.EllipsePerimeter;
            style[mxConstants.STYLE_FONTCOLOR] = 'gray';
            style[mxConstants.STYLE_FILLCOLOR] = '#A0C88F';
            style[mxConstants.STYLE_GRADIENTCOLOR] = 'white';
            style[mxConstants.STYLE_STROKECOLOR] = '#A0C88F';
            style[mxConstants.STYLE_ALIGN] = mxConstants.ALIGN_CENTER;
            style[mxConstants.STYLE_VERTICAL_ALIGN] = mxConstants.ALIGN_MIDDLE;
            style[mxConstants.STYLE_FONTSIZE] = 16;
            graph.getStylesheet().putCellStyle('start', style);
            
            style = mxUtils.clone(style);
            style[mxConstants.STYLE_FILLCOLOR] = '#DACCBC';
            style[mxConstants.STYLE_STROKECOLOR] = '#AF7F73';
            graph.getStylesheet().putCellStyle('end', style);
            
            return graph;
        };
        
        /**
         * Returns a random state.
         */
        function getState()
        {
            var state = 'Init';
            var rnd = Math.random() * 4;
            
            if (rnd > 3)
            {
                state = 'Completed';
            }
            else if (rnd > 2)
            {
                state = 'Running';
            }
            else if (rnd > 1)
            {
                state = 'Waiting';
            }
            
            return state;
        };
    </script>

<div class="page-header">
    <div class="col-md-4 text-xs-center text-md-left text-nowrap">
      <h1>
        <span class="text-muted font-weight-light"><i class="page-header-icon menu-icon fa fa-tachometer"></i>Dashboard / </span>
        Balanced Scorecard
      </h1>
    </div>
</div> 



<div class="panel">

<div class="panel-body">  
    
      <div class="row">
        <body onload="main(document.getElementById('graphContainer'));">
            <center><div id="graphContainer" style="overflow:hidden;position:relative;width:861px;height:406px;cursor:default;">
            </div></center>
        </body>
      </div>
 

</div>
</div>