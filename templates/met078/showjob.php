<!--<?php
require_once template('head'); 
require_once template('webbar');
$methits=methtml_hits('job');
$met_next=methtml_prenextinfo(1);
echo <<<EOT
-->
        <div class="showjob webbox mrt">
            <h1 class="title">{$lang_Position}：$job[position]</h1>
            <div class="para">
			    <ul>
                    <li><b>$lang_PersonNumber : </b>$job[count]</li>
                    <li><b>$lang_WorkPlace : </b>$job[place]</li>
                    <li><b>$lang_Deal : </b>$job[deal]</li>
                    <li><b>$lang_AddDate : </b>$job[addtime]</li>
                    <li><b>$lang_Validity : </b>$job[useful_life]</li>
                </ul>
				<div class="clear"></div>
				<div class="info_cv"><a href="$job[cv]" {$metblank} title="$lang_cvtitle" class='hover-none'><span>{$lang_cvtitle}</span></a></div>
				<div class="clear"></div>
			</div>
			<h3 class="conttitle"><span>{$lang_JobDescription}</span></h3>
            <div class="text editor">$job[content]</div>
			<div class="hits">$methits</div>
            <div class="page">$met_next</div>
              <i class="lt"></i>
              <i class="rt"></i>
              <i class="lb"></i>
              <i class="rb"></i>
        </div>
    </div>
    <div class="clear"></div>
</div>
<!--
EOT;
require_once template('foot'); 
?>