<div class="main-wrap">
   <div class="in-wrap">
      <div class="container">
         <h3>Count Days</h3>
         <div class="filter">
            <div class="row">
               <div class="col-md-6 col-sm-12 col-xs-12">
                  <ul id="cat-navi2" class="nav-list review hidden-phone">
                     <li class="nav-header">Start Date</li>
                     <li>
                        <div class="range">
                           <table width="100%" cellpadding="5">
                              <tbody>
                                 <tr>
                                    <td width="20%">
                                       <label>Day:</label>
                                       <input name="start_day" class="required" value="" placeholder="dd" type="text" onfocus="showSuggestion(this,'d')" pattern="[0-9]*" maxlength="2" size="3"  title="Please enter the day of the month as a one or two-digit number. The valid range is from 1 to 31.">
                                    </td>
                                    <td><label>&nbsp;</label>/</td>
                                    <td width="20%">
                                       <label>Month:</label>
                                       <input name="start_month" class="required" value="" placeholder="mm" type="text" autocomplete="off" onfocus="showSuggestion(this,'m')" maxlength="12" size="3" title="Please enter the month of the year as a one or two-digit number, or as a name. The valid numeric range is from 1 to 12, and valid names, for example, are 'Oct' or 'October'.">
                                    </td>
                                    <td><label>&nbsp;</label>/</td>
                                    <td width="30%">
                                       <label>Year:</label>
                                       <input name="start_year" class="required" value="" placeholder="yyyy" type="text" onfocus="showSuggestion(this,'y')" pattern="[0-9]*" maxlength="4" size="5" title="Enter year as a 4-digit number.">
                                    </td>
                                    <td>
                                       <label>Date:</label>
                                       <button type="button" class="btn btn-default start-date-cal calendar_btn"><i class="fa fa-calendar"></i></button>
                                    </td>
                                 </tr>
                              </tbody>
                           </table>
                        </div>
                     </li>
                  </ul>
               </div>
               <div class="col-md-6 col-sm-12 col-xs-12">
                  <ul id="cat-navi2" class="nav-list review hidden-phone">
                     <li class="nav-header">End Date</li>
                     <li>
                        <div class="range">
                           <table width="100%" cellpadding="5">
                              <tbody>
                                 <tr>
                                    <td width="20%">
                                       <label>Day:</label>
                                       <input name="end_day" class="required" value="" placeholder="dd" type="text" onfocus="showSuggestion(this,'d')" pattern="[0-9]*" maxlength="2" size="3"  title="Please enter the day of the month as a one or two-digit number. The valid range is from 1 to 31.">
                                    </td>
                                    <td><label>&nbsp;</label>/</td>
                                    <td width="20%">
                                       <label>Month:</label>
                                       <input name="end_month" class="required" value="" placeholder="mm" type="text" onfocus="showSuggestion(this,'m')" autocomplete="off"  maxlength="12" size="3" title="Please enter the month of the year as a one or two-digit number, or as a name. The valid numeric range is from 1 to 12, and valid names, for example, are 'Oct' or 'October'.">
                                    </td>
                                    <td><label>&nbsp;</label>/</td>
                                    <td width="30%">
                                       <label>Year:</label>
                                       <input name="end_year" class="required" value="" placeholder="yyyy" type="text" onfocus="showSuggestion(this,'y')" pattern="[0-9]*" maxlength="4" size="5" title="Enter year as a 4-digit number.">
                                    </td>
                                    <td>
                                       <label>Date:</label>
                                       <button type="button" class="btn btn-default end-date-cal calendar_btn"><i class="fa fa-calendar"></i></button>
                                    </td>
                                 </tr>
                              </tbody>
                           </table>
                        </div>
                     </li>
                  </ul>
               </div>
               <div class="col-md-12 col-sm-12 col-xs-12">
                  <!--div class="check">
                     <input type="checkbox" id="a1"> <label for="a1">Include end date in calculation (1 day is added)</label>
                  </div-->
                  <button class="btn btn-info calculate cal-duration" type="button">Calculate Duration</button>
               </div>
            </div>
         </div>
      </div>
	  <div class="cal-duration-result-wrap" style="display:none;">
		  <div class="head">
			 <div class="container">
				<h2>Showing Results</h2>
			 </div>
		  </div>
		  <div class="container">
			 <!-- /left SIDE--> 
			 <div class="filter">
				<!-- CONTENT SIDE-->
				<div class="row">
				   <div class="col-md-12 col-sm-12 col-xs-12">
					  <span class="cal-duration-result"></span>
				   </div>
				</div>
			 </div>
		  </div>
	  </div>
   </div>
</div>
<div class="s-day" style="display:none;">
	<div class="mn">
	   <table>
		  <tbody>
			 <tr>
				<td valign="top">
				   <ul class="mn">
					  <li><a class="lr" href="javascript:selectDay(1)">01</a></li>
					  <li><a class="lr" href="javascript:selectDay(2)">02</a></li>
					  <li><a class="lr" href="javascript:selectDay(3)">03</a></li>
					  <li><a class="lr" href="javascript:selectDay(4)">04</a></li>
					  <li><a class="lr" href="javascript:selectDay(5)">05</a></li>
					  <li><a class="lr" href="javascript:selectDay(6)">06</a></li>
					  <li><a class="lr" href="javascript:selectDay(7)">07</a></li>
					  <li><a class="lr" href="javascript:selectDay(8)">08</a></li>
					  <li><a class="lr" href="javascript:selectDay(9)">09</a></li>
					  <li><a class="lr ls" href="javascript:selectDay(10)">10</a></li>
				   </ul>
				</td>
				<td valign="top">
				   <ul class="mn">
					  <li><a class="lr" href="javascript:selectDay(11)">11</a></li>
					  <li><a class="lr" href="javascript:selectDay(12)">12</a></li>
					  <li><a class="lr" href="javascript:selectDay(13)">13</a></li>
					  <li><a class="lr" href="javascript:selectDay(14)">14</a></li>
					  <li><a class="lr" href="javascript:selectDay(15)">15</a></li>
					  <li><a class="lr" href="javascript:selectDay(16)">16</a></li>
					  <li><a class="lr" href="javascript:selectDay(17)">17</a></li>
					  <li><a class="lr" href="javascript:selectDay(18)">18</a></li>
					  <li><a class="lr" href="javascript:selectDay(19)">19</a></li>
					  <li><a class="lr ls" href="javascript:selectDay(20)">20</a></li>
				   </ul>
				</td>
				<td valign="top">
				   <ul class="mn">
					  <li><a class="lr" href="javascript:selectDay(21)">21</a></li>
					  <li><a class="lr" href="javascript:selectDay(22)">22</a></li>
					  <li><a class="lr" href="javascript:selectDay(23)">23</a></li>
					  <li><a class="lr" href="javascript:selectDay(24)">24</a></li>
					  <li><a class="lr" href="javascript:selectDay(25)">25</a></li>
					  <li><a class="lr" href="javascript:selectDay(26)">26</a></li>
					  <li><a class="lr" href="javascript:selectDay(27)">27</a></li>
					  <li><a class="lr" href="javascript:selectDay(28)">28</a></li>
					  <li><a class="lr" href="javascript:selectDay(29)">29</a></li>
					  <li><a class="lr ls" href="javascript:selectDay(30)">30</a></li>
				   </ul>
				</td>
				<td valign="top">
				   <ul class="mn">
					  <li><a href="javascript:selectDay(31)">31</a></li>
				   </ul>
				</td>
			 </tr>
		  </tbody>
	   </table>
	</div>
</div>
<div class="s-month" style="display:none;">
	<div class="mn">
	   <ul class="mn">
		  <li><a href="javascript:selectMonth(1)" >01 - Jan</a></li>
		  <li><a href="javascript:selectMonth(2)" >02 - Feb</a></li>
		  <li><a href="javascript:selectMonth(3)" >03 - Mar</a></li>
		  <li><a href="javascript:selectMonth(4)" >04 - Apr</a></li>
		  <li><a href="javascript:selectMonth(5)" >05 - May</a></li>
		  <li><a href="javascript:selectMonth(6)" >06 - Jun</a></li>
		  <li><a href="javascript:selectMonth(7)" >07 - Jul</a></li>
		  <li><a href="javascript:selectMonth(8)" >08 - Aug</a></li>
		  <li><a href="javascript:selectMonth(9)" >09 - Sep</a></li>
		  <li><a href="javascript:selectMonth(10)" >10 - Oct</a></li>
		  <li><a href="javascript:selectMonth(11)" >11 - Nov</a></li>
		  <li><a class=" ls" href="javascript:selectMonth(12)" >12 - Dec</a></li>
	   </ul>
	</div>
</div>

<div class="s-year" style="display:none;">
	<div class="mn">
	   <ul class="mn">
	      <li><a href="javascript:selectYear(2014)">2014</a></li>
		  <li><a href="javascript:selectYear(2015)">2015</a></li>
		  <li><a href="javascript:selectYear(2016)">2016</a></li>
		  <li><a href="javascript:selectYear(2017)">2017</a></li>
		  <li><a href="javascript:selectYear(2018)">2018</a></li>
		  <li><a href="javascript:selectYear(2019)">2019</a></li>
		  <li><a href="javascript:selectYear(2020)">2020</a></li>
		  <li><a href="javascript:selectYear(2021)">2021</a></li>
		  <li><a href="javascript:selectYear(2022)">2022</a></li>
		  <li><a href="javascript:selectYear(2023)">2023</a></li>
		  <li><a href="javascript:selectYear(2024)">2024</a></li>
		  <li><a href="javascript:selectYear(2025)">2025</a></li>
		  <li><a href="javascript:selectYear(2026)">2026</a></li>
		  <li><a href="javascript:selectYear(2027)">2027</a></li>
		  <li><a class="ls" href="javascript:selectYear(10)">2028</a></li>
	   </ul>
	</div>
</div>
<?= $this->Html->script('calc'); ?>