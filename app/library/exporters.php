<?php

class Exporters
{
    public static function prepareDocument( Plan $plan )
    {
        $template = Template::where( 'id', $plan->template_id )->first();
        $sections = Section::where( 'template_id', $template->id )->orderby('order')->get();
        $questions = Question::where( 'template_id', $template->id )->whereNull( 'parent_question_id' )->where( 'text', '!=', '' )->get();
        
        $document = new PhpWord();
        
        $document->setDefaultFontName( 'Verdana' );
        $document->setDefaultFontSize( 10 );
        
        $document_metadata = $document->getDocInfo();
        $document_metadata->setCreator( Auth::user()->realname );
        //$document_metadata->setCompany( Auth::user()->institution()->name() );
        $document_metadata->setTitle( 'DMP for Project ' . $plan->project_number );
        $document_metadata->setDescription( 'This document includes a Datamanagement Plan for Project ' . $plan->project_number );
        //$document_metadata->setCategory('My category');
        $document_metadata->setLastModifiedBy( Auth::user()->realname );
        //$document_metadata->setCreated(mktime(0, 0, 0, 3, 12, 2014));
        //$document_metadata->setModified(mktime(0, 0, 0, 3, 14, 2014));
        //$document_metadata->setSubject('My subject');
        //$document_metadata->setKeywords('my, key, word');
        
        /*
        $plan_filename = 'DMP-' . $project_number . '_' . $plan->updated_at->format('Ymd') . '.pdf';
        $template = Template::where( 'id', $plan->template_id )->first();
        $sections = Section::where( 'template_id', $template->id )->orderby('order')->get();
        $questions = Question::where( 'template_id', $template->id )->whereNull( 'parent_question_id' )->where( 'text', '!=', '' )->get();
            
        $pdf = PDF::loadView( 'plan.pdf', compact('plan', 'template', 'sections', 'questions', 'plan_date', 'plan_author', 'plan_institution') );            
        if( $download == 1 )
        {
            return $pdf->download( $plan_filename );                
        }
        else
        {
            return $pdf->stream( $plan_filename );                 
        }
        */
        
        
        
        $tableStyle = array(
            'border' => 'none',
            'cellMargin' => 0
        );
        
        $cellStyle = array();
        
        $tocFontStyle = array();
        
        $tocStyle = array(
            'tabLeader'=>PHPWord_Style_TOC::TABLEADER_DOT,
            'tabPos' => 8000
        );
        
        //$firstRowStyle = array('bgColor' => '66BBFF');
        $document->addTableStyle('frontpage_details', $tableStyle);
        $document->addTitleStyle(1, array('bold' => true), array('spaceAfter' => 240));
        
        $frontpage_section = $document->addSection();
        $frontpage_section->addImage(
            public_path() . '/images/logo-szf.png',
            array(
                'width' => 100,
                'height' => 100,
                'marginTop' => -1,
                'marginLeft' => -1,
                'wrappingStyle' => 'behind'
            )
        );
        
        $frontpage_table = $frontpage_section->addTable('frontpage_details');
        $frontpage_table->addRow();
        $frontpage_table->addCell(1500, $cellStyle)->addText( htmlspecialchars('Datum:') );
        $frontpage_table->addCell(6000, $cellStyle)->addText( $plan->updated_at->format('d.m.Y') );
        $frontpage_table->addRow();
        $frontpage_table->addCell(1500, $cellStyle)->addText( htmlspecialchars('Erstellt von:') );
        $frontpage_table->addCell(6000, $cellStyle)->addText( $plan->user->realname . ', ' . $plan->user->institution->name );
           
        $frontpage_section->addText('Inhaltsverzeichnis', 'Fett');
        $frontpage_section->addTextBreak(2);
        $frontpage_section->addTOC( $tocFontStyle, $tocStyle );
        $frontpage_section->addPageBreak();
        
        foreach( $sections as $section )
        {
            //$document_section = $document->addSection( array('pageNumberingStart' => $i) );
            $document_section = $document->addSection();
            
            $document_header = $document_section->addHeader();

            $document_header_table = $document_header->addTable();
            $document_header_table->addRow();
            $document_header_table->addCell(4500)->addText('Datenmanagementplan');
            $document_header_table->addCell(4500)->addImage( public_path() . '/images/logo-szf.png', array('width'=>50, 'height'=>50, 'align'=>'right'));

            $document_footer = $document_section->addFooter();            
            $document_footer->addPreserveText(htmlspecialchars('Seite {PAGE}/{NUMPAGES}'), null, array('align' => 'center'));
            
            $document_section->addTitle( $section->keynumber . '. ' . $section->name , 1);
            foreach( $questions as $question )
            {
                if( $question->section_id == $section->id )
                {
                    //$plan_section->addText( $question->id );
                    $document_section->addText( $section->keynumber . '.' . $question->keynumber . ' ' . $question->text );                      
                }
            }
        }
        return $document;
    }
    
    public static function getDOCX( Plan $plan )
    {
        $document = Exporters::prepareDocument( $plan );
        $file = public_path() . '/plans/' . $plan->project_number . '-' . $plan->updated_at->format('Ymd') . '.docx';
        $headers = array('Content-Type: application/docx');        
        $objWriter = IOFactory::createWriter($document, 'Word2007');
        $objWriter->save( $file );
        return Response::download( $file, 'DMP for Project ' . $plan->project_number . '-' . $plan->updated_at->format('Ymd') . '.docx', $headers );
    }
    
    public static function getOTF( Plan $plan )
    {
        $document = Exporters::prepareDocument( $plan );
        $file = public_path() . '/plans/' . $plan->project_number . '-' . $plan->updated_at->format('Ymd') . '.odt';
        $headers = array('Content-Type: application/docx');        
        $objWriter = IOFactory::createWriter($document, 'ODText');
        $objWriter->save( $file );
        return Response::download( $file, 'DMP for Project ' . $plan->project_number . '-' . $plan->updated_at->format('Ymd') . '.odt', $headers );
    }
    
    public static function getHTML( Plan $plan )
    {
        $document = Exporters::prepareDocument( $plan );
        $file = public_path() . '/plans/' . $plan->project_number . '-' . $plan->updated_at->format('Ymd') . '.html';
        $headers = array('Content-Type: text/html');        
        $objWriter = IOFactory::createWriter($document, 'HTML');
        $objWriter->save( $file );
        return Response::download( $file, 'DMP for Project ' . $plan->project_number . '-' . $plan->updated_at->format('Ymd') . '.html', $headers );
    }
    
    public static function getRTF( Plan $plan )
    {
        $document = Exporters::prepareDocument( $plan );
        $file = public_path() . '/plans/' . $plan->project_number . '-' . $plan->updated_at->format('Ymd') . '.rtf';
        $headers = array('Content-Type: text/rtf');        
        $objWriter = IOFactory::createWriter($document, 'RTF');
        $objWriter->save( $file );
        return Response::download( $file, 'DMP for Project ' . $plan->project_number . '-' . $plan->updated_at->format('Ymd') . '.rtf', $headers );
    }    
    
    public static function getPDF( Plan $plan )
    {
        // PDF Parser Settings
        $pdf_parser_path = realpath('../vendor/dompdf/dompdf');
        $pdf_parser_name = 'DomPDF';
        \PhpOffice\PhpWord\Settings::setPdfRendererPath( $pdf_parser_path );
        \PhpOffice\PhpWord\Settings::setPdfRendererName( $pdf_parser_name );
        
        $pdfLibraryName = \PhpOffice\PhpWord\Settings::getPdfRendererName();
        $pdfLibraryPath = \PhpOffice\PhpWord\Settings::getPdfRendererPath();
        
        $document = Exporters::prepareDocument( $plan );
        
        //$file = public_path() . '/plans/' . $plan->project_number . '-' . $plan->updated_at->format('Ymd') . '.docx';
        //$headers = array('Content-Type: application/docx');        
        //$objWriter = IOFactory::createWriter($document, 'Word2007');
        //$objWriter->save( $file );
        
        $file = public_path() . '/plans/' . $plan->project_number . '-' . $plan->updated_at->format('Ymd') . '.pdf';
        $headers = array('Content-Type: application/pdf');        
        $objWriter = IOFactory::createWriter($document, 'PDF');
        $objWriter->save( $file );
        return Response::download( $file, 'DMP for Project ' . $plan->project_number . '-' . $plan->updated_at->format('Ymd') . '.pdf', $headers );
    }    
}