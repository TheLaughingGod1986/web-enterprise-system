    <!--    /////////////////////START SHOW COMMENTS//////////////////-->
    <h1><?php echo $realReport->Report_Name; ?></h1>
    <h3><?php echo $realReport->ReportDate; ?></h3>
    <span>External Examiner: </span>
    <table class="repTB">
        <tr>
            <th colspan="2">Section 1 - Examiner's attendance and portfolio of work </th>
        </tr>
        <tr>
            <td>Semester 2 Subject Assessment Panel</td>
            <td><?php echo $realReport->Semester1SubjectPanel; ?></td>
        </tr>
        <tr>
            <td>Semester 2 Subject Assessment Panel</td>
            <td><?php echo $realReport->Semester2SubjectPanel; ?></td>
        </tr>
        <tr>
            <td>Progression and Award Board(s)</td>
            <td><?php echo $realReport->ProgressionandAwardBoards; ?></td>
        </tr>
        <tr>
            <td>Partner College(s)</td>
            <td><?php echo $realReport->PartnerCollege; ?></td>
        </tr>
        <tr>
            <td>Approval/Review Panel(s)</td>
            <td><?php echo $realReport->ApprovalReviewPanel; ?></td>
        </tr>
        <tr>
            <td>Teaching Practice(s)</td>
            <td><?php echo $realReport->TeachingPractise; ?></td>
        </tr>
        <tr>
            <td>Clinical Assessment(s)</td>
            <td><?php echo $realReport->ClinicalAssessment; ?></td>
        </tr>
        <tr>
            <td>Viva Voce Examination</td>
            <td><?php echo $realReport->VivaVoceExamination; ?></td>
        </tr>
        <tr>
            <td>Other</td>
            <td><?php echo $realReport->Other; ?></td>
        </tr>
        <tr><th colspan="2">Comments</th></tr>
        <tr><td colspan="2"><?php echo $realReport->Section_1_Comments; ?></td></tr>
    </table>

    <table class="repTB">
        <tr>
            <th colspan="2">Section 2 - Process of Assessment and Determination of Award</th>
        </tr>
        <tr>
            <td>Assessment processes were appropriate to examining learning outcomes</td>
            <td><?php echo $realReport->Section2_Checkbox_1; ?></td>
        </tr>
        <tr>
            <td>Assessments contained clear feedback to students (where applicable)</td>
            <td><?php echo $realReport->Section2_Checkbox_2; ?></td>
        </tr>
        <tr>
            <td>Assessments were marked consistently to an appropriate standard</td>
            <td><?php echo $realReport->Section2_Checkbox_3; ?></td>
        </tr>
        <tr>
            <td>Assessments evidenced second marking to an appropriate standard</td>
            <td><?php echo $realReport->Section2_Checkbox_4; ?></td>
        </tr>
        <tr>
            <td>Assessment level was appropriate</td>
            <td><?php echo $realReport->Section2_Checkbox_5; ?></td>
        </tr>
        <tr>
            <td>Awards conferred were appropriate to the level of achievement</td>
            <td><?php echo $realReport->Section2_Checkbox_6; ?></td>
        </tr>
        <tr>
            <td>The decision of the PAB was fair, equitable and consistent</td>
            <td><?php echo $realReport->Section2_Checkbox_7; ?></td>
        </tr>
        <tr><td>Additional commentary</td></tr>
        <tr><td><?php echo $realReport->Section2_Comments; ?></td></tr>
    </table>

    <table class="repTB">
        <tr><th colspan="2">Section 3 - The Appropiateness of Standards</th></tr>
        <tr>
            <td>Standards set for the award(s) are appropriate for qualifications at this level in this subject</td>
            <td><?php echo $realReport->Section3_Checkbox1; ?></td>
        </tr>
        <tr><td colspan="2">Additional commentary</td></tr>
        <tr><td colspan="2"><?php echo $realReport->Section3_Comments; ?></td></tr>
    </table>

    <table class="repTB">
        <tr><th colspan="2">Section 4 - The Comparability of Student Performance</th></tr>
        <tr>
            <td>The standards of student performance are comparable with similar programmes or subjects in other UK institutions with which I am familiar</td>
            <td><?php echo $realReport->Section4_Checkbox1; ?></td>
        </tr>
        <tr>
            <td>Course Examiners</td>
            <td><?php echo $realReport->CourseExaminers; ?></td>
        </tr>
        <tr>
            <td>Programme Examiners</td>
            <td><?php echo $realReport->ProgrammeExaminers; ?></td>
        </tr>
    </table>

    <table class="repTB">
        <tr><th colspan="2">Section 5 - Professional, Statutory and Regulatory Bodies (PSRB)</th></tr>
        <tr>
            <td colspan="2"><?php echo $realReport->Section5_PSRB; ?></td>
        </tr>
    </table>

    <table class="repTB">
        <tr><th colspan="2">Section 6 - Action Points and Recommendations</th></tr>
        <tr>
            <td>Commentary</td>
            <td><?php echo $realReport->AP_Recommendations; ?></td>
        </tr>
        <tr>
            <td>Good Practice and Innovation</td>
            <td><?php echo $realReport->GoodPractice_Innovation; ?></td>
        </tr>
        <tr>
            <td>Recommendations for Action</td>
            <td><?php echo $realReport->Recommendations_Action; ?></td>
        </tr>
    </table>

    <?= form_open('main/add_old_report'); ?>

    <?= form_hidden('ReportID', $this->uri->segment(3)); ?>

    <button type="submit" value="read report" class="btn btn-danger">Old Report/Mark as Read</button>

    </form>
    <?php
    if ($this->session->flashdata('messagethree')) {
        ?>
        <div class="message flash">
            <?php echo $this->session->flashdata('messagethree'); ?>
        </div>
        <?php
    }
    ?>
    <h2>comments</h2>
    <table class="table table-hover">
        <thead>
        <tr style="background: #F7F2D9; text-align: center;">
            <th><h4>UserName</h4></th>
            <th><h4>Date Made</h4></th>
        </tr>
        </thead>
        <tbody>

        <?php if (isset($reports)) :
        foreach ($reports as $row) : ?>
        </tbody>
        <tr style="background-color: rgba(152, 18, 18, 0.39); text-align: center;">
            <td><b>
                   <?php
                        echo $row->Username;
                        echo $row->Staff_Username;
                   ?>
                </b></td>
            <td><b><?php echo $row->Comment_Date; ?></b></td>
            </tr>
        <tr>
            <td colspan="2"><h4>Comment</h4></td>
        </tr>
        <tr>
            <td colspan="2"><p><?php echo $row->Comments; ?></p></td>
        </tr>

    <?php endforeach; ?>
    </table>

    <?php else : ?>
        <p>No Comments</p>
    <?php endif; ?>

    <p><?= anchor('main', 'Back home'); ?></p>
    <!--    /////////////////////END SHOW COMMENTS//////////////////-->

    <!--    /////////////////////START ADD COMMENT FORM//////////////////-->
    <div class="col-sm-4">
    <?= form_open('main/comment_add'); ?>

    <?= form_hidden('ReportID', $this->uri->segment(3)); ?>

    <p><textarea name="Comments" rows="10"></textarea></p>
    <p><input type="submit" value="add comment"/></p>

    <?php
    if ($this->session->flashdata('messagetwo')) {
        ?>
        <div class="message flash">
            <?php echo $this->session->flashdata('messagetwo'); ?>
        </div>
        <?php
    }
    ?>
    </form>
    <!--    /////////////////////END ADD COMMENT FORM//////////////////-->

</div>

