<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
		
		
		<title>Details Report</title>
		<style>
		table{
			vertical-align: middle;
			font-size:.8em;
			border-collapse: collapse;
		}
		table thead tr th{
			text-align:center;
			border: 1px solid black;
		}
		table, td, th{
			
			border: 1px solid black;
		}
		tr {
			page-break-inside: avoid;
		}
		tr.total {
			page-break-before: avoid;
		}
		@media print 
		{
			.newPage {page-break-before: always;}
		}
		</style>
	</head>
	<body>
		<div id="estimate" style="font-size:.9em;">
			<div style="width:100%;text-align: center;"><b><u>Form - VII</u><br/>[See Rule 24]</b><br/><br/><u>Estimate of preliminary cost of land acquisition under Act 30 of 2013</u></div>
			<div style="width:100%;text-align: justify;text-justify: inter-word;">
				Name of Requiring Body : National Highway and Infrastructure Development Corporation Ltd. requiring the land {{{$area['b']}}} Bigha {{{$area['k']}}} Katha
				 {{{$area['l']}}} Lecha in Village {{{$village->name}}}, Mouza {{{$mouza->name}}},Circle {{{$circle->name}}}, District {{{$district->name}}}.
				
			</div>
			<b>Part - I</b>
			<table>
				<tr>
					<td>(1)</td>
					<td></td>
					<td colspan="4">Market Value of land as provided under subsection (1) of section 26</td>				
				</tr>
				<tr>
					<td></td>
					<td>(a)</td>
					<td>Description of Land</td>
					<td style="text-align: center;">Area of Land<br/>B-K-L</td>
					<td style="text-align: center;">Rate per Bigha<br/>in Rs.</td>
					<td style="text-align: center;">Amount<br/>in Rs.</td>
				</tr>
				@foreach ($lands as $land)
				@if(!($land['area']['b']==0 && $land['area']['k']==0 && $land['area']['l']==0 ))
				<tr>
					<td></td>
					<td></td>
					<td style="text-align: left;">{{{$land['name']}}}</td>
					<td style="text-align: center;">{{{$land['area']['b']}}}-{{{$land['area']['k']}}}-{{{$land['area']['l']}}}</td>
					<td style="text-align: right;">{{{$land['rate']}}}</td>
					<td style="text-align: right;">{{{$land['value']}}}</td>
				</tr>
				@endif
				@endforeach
				<tr>
					<td></td>
					<td>(b)</td>
					<td>Deduct Conversion Premium of A.P. Land if any</td>
					<td colspan="3" style="text-align: right;">Rs.{{{$baad}}}</td>
					
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td style="text-align: right;">Total</td>
					<td colspan="3" style="text-align: right;">Rs.{{{$total_after_baad}}}</td>				
				</tr>
				<tr>
					<td>(2)</td>
					<td></td>
					<td>Factor by which the market value is to be multiplied as provided under sub-section(2) of section 26 as notified by the state Govt.</td>
					<td colspan="3" style="text-align: right;">{{{$factor}}}</td>				
				</tr>
				<tr>
					<td>(3)</td>
					<td></td>
					<td style="text-align: right;">Total market value of land determined under sub-section (1) & (2) of section 26 [(1)x(2)]</td>
					<td colspan="3" style="text-align: right;">Rs.{{{$factoredValue}}}</td>				
				</tr>
				<tr>
					<td>(4)</td>
					<td></td>
					<td>Value of assests attached to land or bulding as provided under section 29</td>
					<td colspan="3" style="text-align: right;"></td>				
				</tr>
				<tr>
					<td></td>
					<td>(a)</td>
					<td>Houses</td>
					<td colspan="3" style="text-align: right;">Rs.{{{$building}}}</td>				
				</tr>
				<tr>
					<td></td>
					<td>(b)</td>
					<td>Trees</td>
					<td colspan="3" style="text-align: right;">Rs.{{{$zirat}}}</td>				
				</tr>
				<tr>
					<td></td>
					<td>(c)</td>
					<td>Wells/Tanks</td>
					<td colspan="3" style="text-align: right;">Rs.0</td>				
				</tr>
				<tr>
					<td></td>
					<td>(d)</td>
					<td>Crops</td>
					<td colspan="3" style="text-align: right;">Rs.0</td>				
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td style="text-align: right;">Total</td>
					<td colspan="3" style="text-align: right;">Rs.{{{$building+$zirat}}}</td>				
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td style="text-align: right;">Total of (3) + (4)</td>
					<td colspan="3" style="text-align: right;">Rs.{{{$total}}}</td>				
				</tr>
				<tr>
					<td>(5)</td>
					<td></td>
					<td>Solatium as provided under sub-section (I) of section 30 @ 100% of (3) + (4)</td>
					<td colspan="3" style="text-align: right;">Rs.{{{$solatium}}}</td>				
				</tr>
				<tr>
					<td>(6)</td>
					<td></td>
					<td>Addl. Compensation @ 12% per annum on the total market value at Sl.(3) as provided under sub-section (3) of section 30</td>
					<td colspan="3" style="text-align: right;">Rs.{{{$compensation}}}</td>				
				</tr>
				<tr>
					<td>(7)</td>
					<td></td>
					<td>Damages as provided under clause 2 to 6 of section 28 (if any)</td>
					<td colspan="3" style="text-align: right;">Rs.0</td>				
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td style="text-align: right;">Total Compensation<br/>[total of (3)+(4)+(5)+(6)+(7)]</td>
					<td colspan="3" style="text-align: right;">Rs.{{{$grandTotal}}}</td>				
				</tr>
			</table>
			
			<b>Part - II</b>
			<p> Add capitalized value of Govt. Revenue : Rs.{{{$rev}}}</p>
			<p> Add conversion premium of A.P. Land : Rs.{{{$baad}}}</p>
			<hr/>
			<b>Part - III</b><br/>
			<u>Administrative cost</u>
			<p> Cost of establishment(@{{{$rateE}}}%) : Rs.{{{$est}}}</p>
			<p> Cost of contingencies(@{{{$rateC}}}%) : Rs.{{{$cont}}}</p>
			<hr/>
			 Grand Total of part I, II & III : Rs.{{{$final_total}}}
			<br/>
			(Rupeese {{{$final_total_words['rupees']}}} Only)
			<br/>
			<br/>
			<br/>
			<br/>
			Prepared By:...............................................
			<br/>
			<br/>
			<br/>
			<br/>
			Checked By:................................................
			<br/>
			<br/>
			<br/>
			<p class="newPage">Certified that estimates is fair and that the rates have been arrived at after local enquiry, inspection of the 
			ground and with reference to the records of the Registration Department.</p>
			<br/>
			<br/>
			<br/>
			<br/>
			<br/>
			<br/>
			<div style="float:left;text-align:center;">Land Acquisition Officer</div>
			<div style="float:right;text-align:center;">Collector<br/><br/>Countersigned By:<br/><br/><br/><br/><br/>
			Divisional Commissioner<br/><br/>Countersigned By:<br/><br/><br/><br/><br/>Secretary to the Govt. of Assam<br/>Revenue& D.M. Department</div>
			<div style="clear:both;"></div>
			<br/>
			Sanctioned by:
			<br/>
			<br/>
			<br/>
			<br/>
			<br/>
			<br/>
			<div style='text-align:left;'>General Manager (Project)<br/>National Highway and Infrastructure Development Corporation Ltd.</div>
		</div>
		<div id="forwarding" class="newPage">
			<h2 align=center style='margin:0cm;margin-bottom:.0001pt;text-align:center'>
			<span style='font-size:12.0pt'>GOVT. OF ASSAM</span></h2>

			<h2 align=center style='margin:0cm;margin-bottom:.0001pt;text-align:center'><span
			style='font-size:12.0pt'>OFFICE OF THE DEPUTY COMMISSIONER ::: NAGAON</span></h2>

			<h2 align=center style='margin:0cm;margin-bottom:.0001pt;text-align:center'><span
			style='font-size:12.0pt'>(LAND ACQUISITION BRANCH)</span></h2>

			<h2 align=center style='margin:0cm;margin-bottom:.0001pt;text-align:center'><span
			style='font-size:12.0pt'>&nbsp;</span></h2>

			<h2 align=center style='margin:0cm;margin-bottom:.0001pt;text-align:center'><span
			style='font-size:12.0pt'>&nbsp;</span></h2>

			<p style='margin:0cm;margin-bottom:.0001pt'>No.NRQ (N.H.)</p>

			<p align=right style='margin:0cm;margin-bottom:.0001pt;text-align:right'>Date:	</p>

			<p align=right style='margin:0cm;margin-bottom:.0001pt;text-align:right'>&nbsp;</p>

			<p class=MsoNormal><em><span style='font-family:"Calibri","sans-serif"'>To </span></em></p>

			<p class=MsoNormal><em><span style='font-family:"Calibri","sans-serif"'>&nbsp;</span></em></p>

			<p style='margin:0cm;margin-bottom:.0001pt'>The General Manager (Project)<br>
			National Highways and Infrastructure Development Corporation Ltd.(NHIDCL),</p>

			<p style='margin:0cm;margin-bottom:.0001pt'>(Ministry of Road Transport and Highways)</p>
			
			<p style='margin:0cm;margin-bottom:.0001pt'>Bhagwatis's Complex</p>
			
			<p style='margin:0cm;margin-bottom:.0001pt'>House No 78, 2nd Floor, Jayanagar</p>
			

			<p style='margin:0cm;margin-bottom:.0001pt'>Jawahar Nagar Road, Khanapara</p>

			<p style='margin:0cm;margin-bottom:.0001pt'>Guwahati-22.</p>

			<p style='margin:0cm;margin-bottom:.0001pt'>Assam</p>

			<p style='margin:0cm;margin-bottom:.0001pt'>&nbsp;</p>

			<p style='margin:0cm;margin-bottom:.0001pt'>Subject: Acquisition of land for construction
			of {{{$scheme}}} ( L.A. Case No. {{{$village->la_case}}})</p>

			<p style='margin:0cm;margin-bottom:.0001pt;text-align:justify;text-justify:
			inter-ideograph'>Sir, </p>

			<p style='margin:0cm;margin-bottom:.0001pt;text-align:justify;text-justify:
			inter-ideograph;text-indent:36.0pt'>With reference to the subject cited above.
			I have the honor to send herewith 3G Estimate of Rs.{{{$final_total}}} (Rupeese {{{$final_total_words['rupees']}}} Only)
			along with other connected papers for acquisition of {{{$area['b']}}} Bigha, {{{$area['k']}}} Katha,{{{$area['l']}}} Lessa patta
			land of Village {{{$village->name}}}, Mouza {{{$mouza->name}}},Circle {{{$circle->name}}}, District {{{$district->name}}} (Assam) under L.A. case No.- {{{$village->la_case}}}.</p>

			<!--<p style='margin:0cm;margin-bottom:.0001pt;text-align:justify;text-justify:
			inter-ideograph;text-indent:36.0pt'>You are requested to take necessary steps
			for sanction of estimated amount and its placement with this office so as to
			meet the cost of acquired land to the affected pattaders. It may be submitted  <br>
			that above amount does not include the compensation as envisaged in Sub -
			section 7 (d) of section 3 G of N.H. Act 2013 regarding which further guidance
			from your end is required.</p>-->

			<p style='margin:0cm;margin-bottom:.0001pt;text-align:justify;text-justify:
			inter-ideograph'>&nbsp;</p>

			<p style='margin:0cm;margin-bottom:.0001pt;text-align:justify;text-justify:
			inter-ideograph;text-indent:36.0pt'>This is for your information and necessary action.</p>

			<p class=MsoNormal align=right style='text-align:right'>&nbsp;</p>

			<p class=MsoNormal align=right style='text-align:right'>&nbsp;</p>

			<p class=MsoNormal align=right style='text-align:right'>Yours faithfully</p>
			<p class=MsoNormal align=right style='text-align:right'>&nbsp;</p>

			<p class=MsoNormal align=right style='text-align:right'>&nbsp;</p>

			<p class=MsoNormal align=right style='text-align:right'>&nbsp;</p>

			<p class=MsoNormal align=right style='text-align:right'>&nbsp;</p>

			<p class=MsoNormal align=right style='text-align:right'>Deputy Commissioner</p>

			<p class=MsoNormal align=right style='text-align:right'>Nagaon</p>

			<p style='margin:0cm;margin-bottom:.0001pt' class="newPage">Enclosed: </p>

			<p style='margin:0cm;margin-bottom:.0001pt'>&nbsp;</p>
			<ol>
				<li>Jamabandi  </li>

				<li> Chitha </li>

				<li> Estimate </li>

				

				<li> Details
				statement English </li>

				<li>
				Certificate P.P. Rule  </li>

				<li> Ceiling free Certificate </li>

				<li>	Certificate about fixation of value of land/Zirat/House.</li>
			</ol>
			<p style='margin:0cm;margin-bottom:.0001pt'>&nbsp;</p>

			<p style='margin:0cm;margin-bottom:.0001pt'>Memo No. NRQ (N.H.)                                                                         
			Date:  </p>

			<p style='margin:0cm;margin-bottom:.0001pt'>&nbsp;</p>

			<p style='margin:0cm;margin-bottom:.0001pt'>Copy to : - </p>

			
			<ol>
			<li> The Principal Secretary to the Govt. of Assam, Land Revenue
			Department,Dispur (Enclosed Jamabandi one copy, Chitha one copy, Estimate one
			copy,Details statement one copy for information and kind necessary action.)</li>

			<li>The Divisional Commissioner, Central Division, Assam for information and kind
			necessary action. </li>

			<li>Director of Land Acquisition of Govt. of Assam, Guwahati for information.</li>
			</ol>
			<p class=MsoListParagraphCxSpMiddle>&nbsp;</p>

			<p class=MsoListParagraphCxSpMiddle>&nbsp;</p>

			<p class=MsoListParagraphCxSpMiddle>&nbsp;</p>

			<p class=MsoListParagraphCxSpLast>&nbsp;</p>

			<p class=MsoNormal align=right style='text-align:right'>Deputy Commissioner,</p>

			<p class=MsoNormal align=right style='text-align:right'>Nagaon</p>

		</div>
		<div id="certificate" class="newPage" style="font-size:1.3em;">
			<p style='text-align:center'>
				<u>L.A.    CASE   NO.         {{{$village->la_case}}}</u><br/>
				Chainage From {{{$village->chainage_from}}} - Chainage To {{{$village->chainage_to}}} 
			</p>



			<p class=MsoNormal>&nbsp;</p>

			<p class=MsoNormal>&nbsp;</p>

			<p class=MsoNormal>Village    :  -- {{{$village->name}}}</p>

			<p class=MsoNormal>Mouza    : -- {{{$mouza->name}}}</p>

			<p class=MsoNormal>Circle       :-- {{{$circle->name}}}</p>

			<p class=MsoNormal>Sub-Divn :-- {{{$subdiv->name}}}</p>

			<p class=MsoNormal>District     :-- {{{$district->name}}}</p>

			<hr/>

			<p class=MsoNormal>&nbsp;</p>

			<p class=MsoNormal>&nbsp;</p>

			<p class=MsoListParagraphCxSpFirst style='text-indent:-18.0pt'>1.<span
			style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>Certified
			that valuation of building is prepared as per valuation fixed by P.W.D. (Building)
			Division, Nagaon (as per schedule A.P.W.D.)</p>

			<p class=MsoListParagraphCxSpMiddle style='text-indent:-18.0pt'>2.<span
			style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>Certified
			that valuation of Jirat including forest is prepared as per Govt. approved list
			of Revenue Department and Forest Department.</p>

			<p class=MsoListParagraphCxSpMiddle style='text-indent:-18.0pt'>3.<span
			style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>Certified
			that valuation of land (Market Value) is prepared as per approval of Deputy Commissioner,
			Nagaon.</p>

			<p class=MsoListParagraphCxSpLast>&nbsp;</p>

			<p class=MsoNormal>&nbsp;</p>

			<p class=MsoNormal>&nbsp;</p>

			<p class=MsoNormal style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;
			margin-left:252.0pt;margin-bottom:.0001pt'>Deputy Commissioner,</p>

			<p class=MsoNormal style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;
			margin-left:252.0pt;margin-bottom:.0001pt'>Nagaon</p>

			
		</div>
		<div id="PPCertificate" class="newPage" style="font-size:1.3em;">
			<p class=MsoNormal align=center style='text-align:center'>
				<u>CERTIFICATE UNDER P.P RULES</u>
			</p>

			<p class=MsoNormal><u><span style='text-decoration:none'> </span></u></p>

			<p class=MsoNormal><u><span style='text-decoration:none'> </span></u></p>

			<p class=MsoNormal>Certificate as required under Land Acquisition, Rehabilitation and Resettlement Act, 2013 in respect of acquisition of land for
			construction of {{{$scheme}}} including Nagaon/Samaguri/Koliabor
			in respect of L.A. Case no. - {{{$village->la_case}}} covering an area  {{{$area['b']}}} Bigha, {{{$area['k']}}} Katha,{{{$area['l']}}} Lessa
			of Village {{{$village->name}}}, Mouza {{{$mouza->name}}},Circle {{{$circle->name}}}, District {{{$district->name}}} (Assam).</p>

			<p class=MsoNormal>&nbsp;</p>

			<hr/>

			<p class=MsoNormal>&nbsp;</p>

			<p class=MsoListParagraphCxSpFirst style='text-indent:-18.0pt'>1.<span
			style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>The
			land proposed to be acquired is suitable for the purpose for which it is
			required.</p>

			<p class=MsoListParagraphCxSpMiddle style='text-indent:-18.0pt'>2.<span
			style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>The
			area of land proposed to be acquired is not excessive to requirement.</p>

			<p class=MsoListParagraphCxSpLast style='text-indent:-18.0pt'>3.<span
			style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>The
			Land proposed to be acquired happens to fit for the Bari Land, Lahi Land, Sali
			and Baw Land etc. There is no suitable site for the purpose to avoid
			acquisition of land.</p>

			<p class=MsoNormal>&nbsp;</p>

			<p class=MsoNormal>It is also certified that the schedule of land as described
			in this Notification u/s 3A of Land Acquisition, Rehabilitation and Resettlement Act, 2013 agrees into.</p>

			<p class=MsoNormal>&nbsp;</p>

			<div style="float: right">
				<div style='text-align: center'>
					Deputy Commissioner<br/>
					Nagaon
				</div>
			</div>                                                                                                              

		</div>
		<div id="landCeilingCertificate" class="newPage" style="font-size:1.3em;">
			<div style="text-align: center"><u>LAND CEILING CERTIFICATE</u></div>
			<div style="text-align: left">
				<p>Certified that the pattadars whose lands described below and proposed for acquisition in L.A. Case No.-{{{$village->la_case}}} do not possess land in excess of 
				ceiling limiting fixed by Govt. of Assam under the Assam Fixation of Ceiling on land Holding Act. 1956 as amended up to date as per verification records in the ceiling branch.</p>
				
			</div>
			<div style="float: right">
				<div style='text-align: center'>
				<br/>
				<br/>
				<br/>
				<br/>
				<br/>
					Deputy Commissioner<br/>
					Nagaon
				</div>
			</div>
			<div style='clear: both'>
				
			</div>
			<br/>
			<br/>
			<br/>
			<br/>
			<br/>
			<div style='float: left'>
				<p>
					Village:-{{{$village->name}}}<br/>
					Mouza  :- {{{$mouza->name}}}<br/>
					Circle :- {{{$circle->name}}}<br/>
					Sub-Division :- {{{$subdiv->name}}}<br/>
					District :- {{{$district->name}}}<br/>
					<br/>
					<br/>
					<br/>
					@foreach($pattas as $patta)
						{{{$patta['type']}}} No. :- 
						@foreach($patta['nos'] as $no)
						{{{$no}}},
						@endforeach
						</br>
					@endforeach
				</p>
			</div>
		</div>
	</body>
</html>