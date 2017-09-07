<?
    $basepageTitle  = 'Lex’ resumé';
    $navigationName = 'resume';

    $seoTitle       = $basepageTitle;
    $seoDescription = 'Resumé of Lex Postma. My experience, skills, education, work, interests and references, all in one place.';
    $seoKeywords    = 'TU,Delft,CV,curriculum vitae,Industrial Design,engineering,Apple';
    $seoAuthor      = 'Lex Postma';
    $seoType        = 'website';

    if (isset($p)) {
        if ($p == 'references'){ // Reference overview page
            $seoTitle       = 'Lex’ references';
            $seoDescription = 'How other people liked working with Lex.';
            $seoKeywords    = 'references,TU,Delft,CV,curriculum vitae,Industrial Design,engineering';
            $basepageTwo     = 'references';
            $includePage    = 'resumeReferenceOverview.php';
            
/*
        } else if ($p == 'comprehensive'){
            $seoTitle       = 'Lex’ comprehensive resumé';
            $seoDescription = 'A more comprehensive resumé of Lex Postma. My experience, skills, education, work, interests and references, all in one place.';
            $extendedResume = 1;
            $includePage    = 'resume.php';
*/
            
        } else { // Checking whether the $p could be a reference
            $referenceCheck = mysqli_query($con,"SELECT * FROM resume_references JOIN authors_creators ON resume_references.author_id=authors_creators.id WHERE published = '1' AND shortname = '$p' GROUP BY shortname;");
            if (mysqli_num_rows($referenceCheck)!=0){ // More than 0 matches = reference
                $post = $p;
                $basepageTwo     = 'references reference';
    
                $row = mysqli_fetch_array($referenceCheck);
               
                $plainTitle = $row['title'];
                $title      = '<h1>'.$plainTitle.'</h1>';
                $summary    = $row['summary'];
                $body       = $row['body'];
                if($body == ''){    $body = '<p>'.$summary.'</p>';   };

                $author     = $row['author'];
                $authorInfo = $row['info'];
                $date       = $row['date'];
                $dateRead   = date("j F Y", strtotime($date));
                $dateHTML   = '<time datetime="'.$date.'" pubdate>'.$dateRead.'</time>';

        		$authorLink = $row['link'];
        		$authorLinkedIn = $row['linkedin'];
        		$authorTwitter = $row['twitter'];
        		$authorByline = '<p class="authorClosing">— '.$author;
        		if($authorTwitter != ''){	$authorByline .= '<a class="social" href="https://twitter.com/'.$authorTwitter.'"><i class="fa fa-twitter"></i></a>';  }
        		if($authorLinkedIn != ''){	$authorByline .= '<a class="social" href="'.$authorLinkedIn.'"><i class="fa fa-linkedin-square"></i></a>';  }
        		if($authorLink != ''){      $authorByline .= '<a class="social" href="'.$authorLink.'"><i class="fa fa-link"></i></a>';      }
                $authorByline .= '<br><span class="authorCredits">'.$authorInfo.'</span></p>';
    
                $seoTitle       = $plainTitle.' • '.$author.' • Lex’ references';
                $seoDescription = $summary;
                $seoKeywords    = 'reference,Lex Postma,'.$author;
                $seoAuthor      = $author;
                $includePage    = 'resumeReference.php';
                
            }
            else { // Checking whether the $p could be a resume category filter
                $p = str_replace('-',' ',strtolower($p));
        		$catCheck = mysqli_query($con,"SELECT * FROM resume_categories WHERE cat_publish = '1' AND category = '$p' ;");
        		
        		if (mysqli_num_rows($catCheck)!=0){ // More than 0 matches = category filter
            		$catfilter = $p;
    
            		$seoTitle      = 'Lex’ resumé filtered by '.$catfilter;
            		$seoKeywords   .= $catfilter;
            		$basepageTwo     = 'filter';
            		$includePage    = 'resume.php';
        		}
                else { // Fallback to custom 404 include page
                    include '../includes/error-404-include.php'; exit; //Do not do any more work in this script.
                };
            };
        };
    }
    else { // main about me page
        $includePage = 'resume.php';
    };

    $anyReferences = mysqli_query($con,"SELECT * FROM resume_references WHERE published = '1' AND listedOnReferences = '1';");
    if (mysqli_num_rows($anyReferences)!=0){ // there are published references
        $referencesOnline = 1;
    }

?>