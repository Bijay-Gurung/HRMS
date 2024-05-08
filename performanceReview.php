<?php
   
    $employee_name = '';
    $job_knowledge_rating = '';
    $job_knowledge_examples = '';
    $learning_speed = '';
    $improvement_opportunities = '';
    $keep_up_to_date = '';
    $quality_of_work_rating = '';
    $quality_of_work_examples = '';
    $feedback_response =  '';
    $ownership_and_excellence = '';
    $error_correction = '';
    $productivity_rating = '';
    $productivity_examples = '';
    $task_prioritization = '';
    $process_improvement = '';
    $deadline_pressure_handling = '';
    $communication_skills_rating = '';
    $communication_examples = '';
    $listening_skills = '';
    $open_respectful_communication = '';
    $conflict_resolution = '';
    $teamwork_collaboration_rating = '';
    $teamwork_examples = '';
    $team_environment_contribution = '';
    $knowledge_sharing = '';
    $adaptation_to_diversity = '';
    

    // Database connection
    $servername = "localhost";
    $username = "root"; 
    $password = ""; 
    $dbname = "hrms"; 
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Form data
        $employee_name = isset($_POST['employee_name']) ? $_POST['employee_name'] : '';
        $job_knowledge_rating = isset($_POST['job_knowledge_rating']) ? $_POST['job_knowledge_rating'] : '';
        $job_knowledge_examples = isset($_POST['job_knowledge_examples']) ? $_POST['job_knowledge_examples'] : '';
        $learning_speed = isset($_POST['learning_speed']) ? $_POST['learning_speed'] : '';
        $improvement_opportunities = isset($_POST['improvement_opportunities']) ? $_POST['improvement_opportunities'] : '';
        $keep_up_to_date = isset($_POST['keep_up_to_date']) ? $_POST['keep_up_to_date'] : '';
        $quality_of_work_rating = isset($_POST['quality_of_work_rating']) ? $_POST['quality_of_work_rating'] : '';
        $quality_of_work_examples = isset($_POST['quality_of_work_examples']) ? $_POST['quality_of_work_examples'] : '';
        $feedback_response = isset($_POST['feedback_response']) ? $_POST['feedback_response'] : '';
        $ownership_and_excellence = isset($_POST['ownership_and_excellence']) ? $_POST['ownership_and_excellence'] : '';
        $error_correction = isset($_POST['error_correction']) ? $_POST['error_correction'] : '';
        $productivity_rating = isset($_POST['productivity_rating']) ? $_POST['productivity_rating'] : '';
        $productivity_examples = isset($_POST['productivity_examples']) ? $_POST['productivity_examples'] : '';
        $task_prioritization = isset($_POST['task_prioritization']) ? $_POST['task_prioritization'] : '';
        $process_improvement = isset($_POST['process_improvement']) ? $_POST['process_improvement'] : '';
        $deadline_pressure_handling = isset($_POST['deadline_pressure_handling']) ? $_POST['deadline_pressure_handling'] : '';
        $communication_skills_rating = isset($_POST['communication_skills_rating']) ? $_POST['communication_skills_rating'] : '';
        $communication_examples = isset($_POST['communication_examples']) ? $_POST['communication_examples'] : '';
        $listening_skills = isset($_POST['listening_skills']) ? $_POST['listening_skills'] : '';
        $open_respectful_communication = isset($_POST['open_respectful_communication']) ? $_POST['open_respectful_communication'] : '';
        $conflict_resolution = isset($_POST['conflict_resolution']) ? $_POST['conflict_resolution'] : '';
        $teamwork_collaboration_rating = isset($_POST['teamwork_collaboration_rating']) ? $_POST['teamwork_collaboration_rating'] : '';
        $teamwork_examples = isset($_POST['teamwork_examples']) ? $_POST['teamwork_examples'] : '';
        $team_environment_contribution = isset($_POST['team_environment_contribution']) ? $_POST['team_environment_contribution'] : '';
        $knowledge_sharing = isset($_POST['knowledge_sharing']) ? $_POST['knowledge_sharing'] : '';
        $adaptation_to_diversity = isset($_POST['adaptation_to_diversity']) ? $_POST['adaptation_to_diversity'] : '';

        // SQL to insert form data into performanceForm table
        $sql = "INSERT INTO performanceForm (employee_name, job_knowledge_rating, job_knowledge_examples, learning_speed, improvement_opportunities, keep_up_to_date, quality_of_work_rating, quality_of_work_examples, feedback_response, ownership_and_excellence, error_correction, productivity_rating, productivity_examples, task_prioritization, process_improvement, deadline_pressure_handling, communication_skills_rating, communication_examples, listening_skills, open_respectful_communication, conflict_resolution, teamwork_collaboration_rating, teamwork_examples, team_environment_contribution, knowledge_sharing, adaptation_to_diversity) 
                VALUES ('$employee_name', '$job_knowledge_rating', '$job_knowledge_examples', '$learning_speed', '$improvement_opportunities', '$keep_up_to_date', '$quality_of_work_rating', '$quality_of_work_examples', '$feedback_response', '$ownership_and_excellence', '$error_correction', '$productivity_rating', '$productivity_examples', '$task_prioritization', '$process_improvement', '$deadline_pressure_handling', '$communication_skills_rating', '$communication_examples', '$listening_skills', '$open_respectful_communication', '$conflict_resolution', '$teamwork_collaboration_rating', '$teamwork_examples', '$team_environment_contribution', '$knowledge_sharing', '$adaptation_to_diversity')";

        if ($conn->query($sql) === TRUE) {
            echo "Evaluation data inserted successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    $conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Human Resource Management System</title>
    <link href="performanceReview.css" rel="stylesheet">
</head>
<body>
    <header>
        <div class="Logo">
            <div id="logo"></div>
            <h3 id="logoName">Innovate Nepal</h3>
        </div>

        <nav>
            <a href="adminPerformanceEvaluation.html" id="Back">Home</a>
        </nav>

        <div class="userlogo">
            <p>Bijay Gurung</p>
            <div class="image"></div>
        </div>

        <p class="role">Admin</p>
    </header>

    <section>        
        <div class="forms">
            <form action="#" method="post">
                <fieldset class="one">
                    <legend>1. Job Knowledge/Technical Skills:</legend>
                    <label for="job_knowledge_rating">How would you rate the employee's understanding and proficiency in job-related skills? (1-5)</label><br>
                    <input type="number" id="job_knowledge_rating" name="job_knowledge_rating" min="1" max="5" required value="<?php echo $job_knowledge_rating; ?>"><br>
        
                    <label for="job_knowledge_examples">Provide examples of how the employee has applied their technical knowledge to solve work-related problems:</label><br>
                    <textarea id="job_knowledge_examples" name="job_knowledge_examples" rows="4" cols="50" required><?php echo $job_knowledge_examples; ?></textarea><br>
        
                    <label for="learning_speed">How quickly does the employee learn new concepts and technologies relevant to their role? (1-5)</label><br>
                    <input type="number" id="learning_speed" name="learning_speed" min="1" max="5" required value="<?php echo $learning_speed; ?>"><br>
        
                    <label for="improvement_opportunities">Does the employee seek out opportunities to improve their job-related skills?</label><br>
                    <input type="radio" id="yes_improvement" name="improvement_opportunities" value="Yes" <?php if($improvement_opportunities == 'Yes') echo 'checked'; ?> required>
                    <label for="yes_improvement">Yes</label>
                    <input type="radio" id="no_improvement" name="improvement_opportunities" value="No" <?php if($improvement_opportunities == 'No') echo 'checked'; ?>>
                    <label for="no_improvement">No</label><br>
        
                    <label for="keep_up_to_date">How well does the employee keep up-to-date with changes and advancements in their field? (1-5)</label><br>
                    <input type="number" id="keep_up_to_date" name="keep_up_to_date" min="1" max="5" required value="<?php echo $keep_up_to_date; ?>"><br>
                </fieldset>
        
                <fieldset class="two">
                    <legend>2. Quality of Work:</legend>
                    <label for="quality_of_work_rating">How consistently does the employee produce high-quality work? (1-5)</label><br>
                    <input type="number" id="quality_of_work_rating" name="quality_of_work_rating" min="1" max="5" required value="<?php echo $quality_of_work_rating; ?>"><br>
        
                    <label for="quality_of_work_examples">Provide examples of the employee's work that demonstrate their attention to detail and quality:</label><br>
                    <textarea id="quality_of_work_examples" name="quality_of_work_examples" rows="4" cols="50" required><?php echo $quality_of_work_examples; ?></textarea><br>
        
                    <label for="feedback_response">How does the employee respond to feedback and incorporate it into their work?</label><br>
                    <textarea id="feedback_response" name="feedback_response" rows="4" cols="50" required><?php echo $feedback_response; ?></textarea><br>
        
                    <label for="ownership_and_excellence">Does the employee take ownership of their work and strive for excellence?</label><br>
                    <input type="radio" id="yes_ownership" name="ownership_and_excellence" value="Yes" <?php if($ownership_and_excellence == 'Yes') echo 'checked'; ?> required>
                    <label for="yes_ownership">Yes</label>
                    <input type="radio" id="no_ownership" name="ownership_and_excellence" value="No" <?php if($ownership_and_excellence == 'No') echo 'checked'; ?>>
                    <label for="no_ownership">No</label><br>
        
                    <label for="error_correction">How often does the employee make errors that require correction, and how do they address these mistakes?</label><br>
                    <textarea id="error_correction" name="error_correction" rows="4" cols="50" required><?php echo $error_correction; ?></textarea><br>
                </fieldset>
        
                <fieldset class="three">
                    <legend>3. Productivity:</legend>
                    <label for="productivity_rating">Does the employee consistently meet or exceed productivity targets? (1-5)</label><br>
                    <input type="number" id="productivity_rating" name="productivity_rating" min="1" max="5" required value="<?php echo $productivity_rating; ?>"><br>
        
                    <label for="productivity_examples">Provide examples of how the employee manages their workload and meets deadlines:</label><br>
                    <textarea id="productivity_examples" name="productivity_examples" rows="4" cols="50" required><?php echo $productivity_examples; ?></textarea><br>
        
                    <label for="task_prioritization">How well does the employee prioritize tasks and manage their time? (1-5)</label><br>
                    <input type="number" id="task_prioritization" name="task_prioritization" min="1" max="5" required value="<?php echo $task_prioritization; ?>"><br>
        
                    <label for="process_improvement">Does the employee seek out ways to streamline processes and increase efficiency?</label><br>
                    <input type="radio" id="yes_process_improvement" name="process_improvement" value="Yes" <?php if($process_improvement == 'Yes') echo 'checked'; ?> required>
                    <label for="yes_process_improvement">Yes</label>
                    <input type="radio" id="no_process_improvement" name="process_improvement" value="No" <?php if($process_improvement == 'No') echo 'checked'; ?>>
                    <label for="no_process_improvement">No</label><br>
        
                    <label for="deadline_pressure_handling">How does the employee handle tight deadlines and high-pressure situations?</label><br>
                    <textarea id="deadline_pressure_handling" name="deadline_pressure_handling" rows="4" cols="50" required><?php echo $deadline_pressure_handling; ?></textarea><br>
                </fieldset>
        
                <fieldset class="four">
                    <legend>4. Communication Skills:</legend>
                    <label for="communication_skills_rating">How effectively does the employee communicate with colleagues and clients? (1-5)</label><br>
                    <input type="number" id="communication_skills_rating" name="communication_skills_rating" min="1" max="5" required value="<?php echo $communication_skills_rating; ?>"><br>
        
                    <label for="communication_examples">Provide examples of how the employee communicates complex ideas clearly and concisely:</label><br>
                    <textarea id="communication_examples" name="communication_examples" rows="4" cols="50" required><?php echo $communication_examples; ?></textarea><br>
        
                    <label for="listening_skills">How well does the employee listen to others and respond appropriately? (1-5)</label><br>
                    <input type="number" id="listening_skills" name="listening_skills" min="1" max="5" required value="<?php echo $listening_skills; ?>"><br>
        
                    <label for="open_respectful_communication">Does the employee communicate openly and respectfully with team members?</label><br>
                    <input type="radio" id="yes_open_respectful" name="open_respectful_communication" value="Yes" <?php if($open_respectful_communication == 'Yes') echo 'checked'; ?> required>
                    <label for="yes_open_respectful">Yes</label>
                    <input type="radio" id="no_open_respectful" name="open_respectful_communication" value="No" <?php if($open_respectful_communication == 'No') echo 'checked'; ?>>
                    <label for="no_open_respectful">No</label><br>
        
                    <label for="conflict_resolution">How does the employee handle conflicts or misunderstandings in communication?</label><br>
                    <textarea id="conflict_resolution" name="conflict_resolution" rows="4" cols="50" required><?php echo $conflict_resolution; ?></textarea><br>
                </fieldset>
        
                <fieldset class="five">
                    <legend>5. Teamwork and Collaboration:</legend>
                    <label for="teamwork_collaboration_rating">How well does the employee work as part of a team? (1-5)</label><br>
                    <input type="number" id="teamwork_collaboration_rating" name="teamwork_collaboration_rating" min="1" max="5" required value="<?php echo $teamwork_collaboration_rating; ?>"><br>
        
                    <label for="teamwork_examples">Provide examples of the employee collaborating with team members to achieve common goals:</label><br>
                    <textarea id="teamwork_examples" name="teamwork_examples" rows="4" cols="50" required><?php echo $teamwork_examples; ?></textarea><br>
        
                    <label for="team_environment_contribution">How does the employee contribute to a positive team environment?</label><br>
                    <textarea id="team_environment_contribution" name="team_environment_contribution" rows="4" cols="50" required><?php echo $team_environment_contribution; ?></textarea><br>
        
                    <label for="knowledge_sharing">Does the employee share their knowledge and expertise with others?</label><br>
                    <input type="radio" id="yes_knowledge_sharing" name="knowledge_sharing" value="Yes" <?php if($knowledge_sharing == 'Yes') echo 'checked'; ?> required>
                    <label for="yes_knowledge_sharing">Yes</label>
                    <input type="radio" id="no_knowledge_sharing" name="knowledge_sharing" value="No" <?php if($knowledge_sharing == 'No') echo 'checked'; ?>>
                    <label for="no_knowledge_sharing">No</label><br>
        
                    <label for="adaptation_to_diversity">How well does the employee adapt to different working styles and personalities within the team? (1-5)</label><br>
                    <input type="number" id="adaptation_to_diversity" name="adaptation_to_diversity" min="1" max="5" required value="<?php echo $adaptation_to_diversity; ?>"><br>
                </fieldset>
        
                <input type="submit" value="Submit"  id="submit" name="submit">
            </form>
        </div>

    </section>

    <script src="script.js"></script>
    <script src="adminNav.js"></script>
    <script src="https://kit.fontawesome.com/4f9d824da5.js" crossorigin="anonymous"></script>
</body>
</html>
