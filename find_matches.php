<?php
session_start();
include "db.php";

if (!isset($_SESSION['uid'])) {
    header("Location: login.php");
    exit();
}

$uid  = $_SESSION['uid'];
$role = $_SESSION['role'];
$targetRole = ($role == 'owner') ? 'seeker' : 'owner';

$my = mysqli_fetch_assoc(
    mysqli_query($conn,"SELECT * FROM preferences WHERE user_id=$uid")
);

if (!$my) {
    header("Location: preferences.php");
    exit();
}

/* 🔹 UPDATED QUERY: fetch contact details also */
$q = mysqli_query($conn,"
    SELECT 
        u.name,
        p.*,
        c.phone,
        c.email AS contact_email,
        c.whatsapp,
        c.visible
    FROM users u
    JOIN preferences p ON u.id = p.user_id
    LEFT JOIN contact_details c ON u.id = c.user_id
    WHERE u.role='$targetRole'
");

$results = [];

while ($r = mysqli_fetch_assoc($q)) {
    $score = 0;

    if ($my['sleep_time'] == $r['sleep_time']) $score += 20;
    if ($my['study_habit'] == $r['study_habit']) $score += 20;
    if ($my['food_habit'] == $r['food_habit']) $score += 20;
    if ($my['smoking'] == $r['smoking']) $score += 20;
    if (abs($my['cleanliness'] - $r['cleanliness']) <= 1) $score += 20;
    if (strtolower($my['city']) == strtolower($r['city'])) {
    $score += 20;
}


    $results[] = [
        'name'     => $r['name'],
        'score'    => $score,
        'phone'    => $r['phone'],
        'email'    => $r['contact_email'],
        'whatsapp' => $r['whatsapp'],
        'visible'  => $r['visible']
    ];
}

usort($results, fn($a,$b)=>$b['score']-$a['score']);
$top5 = array_slice($results,0,5);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Matches</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php include "nav.php"; ?>

<div class="container">
    <h2>Top 5 Matches</h2>

    <?php foreach ($top5 as $m) { ?>
        <div class="match-card">
            <strong><?php echo $m['name']; ?></strong><br>
            Compatibility: <?php echo $m['score']; ?>%

            <?php if ($m['visible'] === 'yes') { ?>
                <hr style="margin:8px 0;">

                <?php if (!empty($m['phone'])) { ?>
                    📞 <a href="tel:<?php echo $m['phone']; ?>">
                        <?php echo $m['phone']; ?>
                    </a><br>
                <?php } ?>

                <?php if (!empty($m['email'])) { ?>
                    📧 <a href="mailto:<?php echo $m['email']; ?>">
                        <?php echo $m['email']; ?>
                    </a><br>
                <?php } ?>

                <?php if (!empty($m['whatsapp'])) { ?>
                    💬 <a href="https://wa.me/<?php echo $m['whatsapp']; ?>" target="_blank">
                        WhatsApp
                    </a>
                <?php } ?>

            <?php } else { ?>
                <p style="font-size:13px;color:#777;">
                    Contact details hidden by user
                </p>
            <?php } ?>
        </div>
    <?php } ?>

    <a href="dashboard.php">
        <button class="secondary-btn">Return to Dashboard</button>
    </a>
</div>

</body>
</html>
