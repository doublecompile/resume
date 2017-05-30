<?php
require "vendor/autoload.php";

use League\Period\Period;
use Libreworks\Microformats\Address;
use Libreworks\Microformats\Card;
use Libreworks\Microformats\Skill;
use Libreworks\Microformats\SkillHeading;
use Libreworks\Microformats\Tag;
use Doublecompile\Resume\JobBuilder;
use Doublecompile\Resume\SkillBuilder;

$present = new \DateTimeImmutable();

$card = new Card([
    'p-name' => new Libreworks\Microformats\Name('Jonathan', 'D.', 'Hawk'),
    'p-adr' => new Address(null, null, null, 'Glen Burnie', 'MD', null, 'US'),
    'p-tel' => '+1 (443) 623-5434',
    'u-photo' => '//gravatar.com/avatar/de49d69373748f850fb95151db9b23cf',
    'u-email' => 'work@doublecompile.com',
    'u-url' => 'http://doublecompile.com'
]);

$experience = [
    JobBuilder::get()->company('Freelance Projects')
        ->title('Software Engineer / Web Developer / System Administrator')
        ->address('Glen Burnie', 'MD', 'US')
        ->dates('2000-01-01', $present)
        ->description(
            "Production of design comps and front-end website development using HTML, CSS, and JavaScript. Development of PHP web applications interfacing with MongoDB, PostgreSQL, or MySQL. Drupal, WordPress, and MediaWiki configuration and customization. Mobile-first responsive design and testing on smartphone and tablet devices. Since May 2007, server administration of an Ubuntu hosting platform with e-mail services for clients. Since March 2011, experience working with Amazon EC2, ECS, S3, KMS, ElastiCache, Route 53, and VPC."
        )->build()
    ,
    JobBuilder::get()->company('Mindgrub Technologies')
        ->title('Lead Managed Services Engineer')
        ->address('Baltimore', 'MD', 'US')
        ->dates('2017-04-17', $present)
        ->description(
            "Influences company policy and processes based on knowledge and experience.",
            "Serves as a DevOps engineer.",
            "* Front-end web development using HTML, CSS, and JavaScript. Implementation and testing of mobile-first responsive design using smartphone, tablet, and desktop devices.",
            "* Installed, configured, and maintained Drupal and WordPress CMS products.",
            "* Custom Drupal module development.",
            "* Created Docker container images.",
            "* Leveraged Kubernetes and Amazon ECS for container orchestration.",
            "* Design and configuration of Amazon Web Services infrastructure; EC2 Linux servers; Integrated with S3, RDS, SES, ElastiCache.",
            "* Design and development of web applications and automated scripts using PHP and Bash."
        )->build()
    ,
    JobBuilder::get()->company('Quevera')
        ->title('Principal Software Architect')
        ->address('Columbia', 'MD', 'US')
        ->dates('2015-05-01', '2017-04-12')
        ->description(
            "Made or influenced company technical decisions based on knowledge and experience.",
            "Served as a software engineer, systems designer, database administrator, software configuration manager, and system administrator of a Software-as-a-Service product.",
            "* Design and development of PHP/Hack web application product using HHVM and XHP. Design and development of REST API.",
            "* Front-end web development using HTML, CSS, and Dojo Toolkit. Implementation and testing of mobile-first responsive design using smartphone, tablet, and desktop devices.",
            "* MongoDB administration.",
            "* Designed and configured Amazon Web Services infrastructure; EC2 Linux servers and ECS containers; Integrated with S3, KMS, SES, ElastiCache. Leveraged CodeDeploy in production and staging delivery systems.",
            "* Created Docker container images",
            "* Creation and maintenance of open source projects. Contribution to external projects.",
            "* Configured and administered revision control using Git. Maintained SCM systems.",
            "* Supervised development team. Crafted requirements and distributed workload.",
            "Served as a web developer and systems designer for various clients.",
            "* Front-end web development using HTML, CSS, and JavaScript. Implementation and testing of mobile-first responsive design using smartphone, tablet, and desktop devices.",
            "* Installed, configured, and maintained Drupal and Joomla! CMS products."
        )->build()
    ,
    JobBuilder::get()->company('SITEC Consulting')
        ->title('Technical Lead / Sr. Software Engineer')
        ->address('Columbia', 'MD', 'US')
        ->dates('2008-01-01', '2014-12-02')
        ->description(
            "Made or influenced company technical decisions based on knowledge and experience. Served as system administrator for the company's production servers. Provided front-end web development for corporate website. Assisted in graphic design and database administration.",
            "Served on contract as a software engineer, systems designer, software configuration manager, and system administrator for 3 years. Helped lead a team of other developers.",
            "* Design and development of Java/Groovy web applications and libraries using Grails, Spring Framework, Hibernate, and Apache Maven. Designed and implemented custom complex authorization and authentication rules. Design and development of REST API.",
            "* Front-end web development using HTML, CSS, and Dojo Toolkit.",
            "* Oracle Database Server schema design.",
            "* Configured UNIX application servers; administration of Apache HTTP Server and Apache Tomcat; performed application deployments.",
            "* Configured and administered revision control using Git. Maintained SCM systems and created guidelines for developer workspace setup.",
            "* Administered Jenkins for continuous integration builds.",
            "Served on a contract as a software engineer, systems designer, database administrator, software configuration manager, and system administrator for 3 years. Led a team of other developers.",
            "* Design and development of Java EE web applications and libraries using Spring Framework, Hibernate, Apache Tiles, JasperReports, and Apache Maven. Designed and implemented custom complex authorization and authentication rules.",
            "* Design and development of REST API.",
            "* Graphic design/user interface design. Front-end web development using HTML, CSS, and Dojo Toolkit.",
            "* Microsoft SQL Server database schema design and maintenance.",
            "* Configured Windows application and database servers; administration of Apache HTTP Server and Apache Tomcat; performed application deployments.",
            "* Configured and administered revision control using Subversion. Maintained SCM systems and created guidelines for developer workspace setup.",
            "* Administered Jenkins for continuous integration builds.",
            "Served on contract as a web developer for 6 months.",
            "* Graphic design and HTML/CSS.",
            "* ColdFusion development; maintenance of existing ColdFusion applications.",
            "* Development of PHP scripts and command line utilities."
        )->build()
    ,
    JobBuilder::get()->company('Exceptional Software Strategies')
        ->title('Software Engineer')
        ->address('Linthicum', 'MD', 'US')
        ->dates('2004-09-01', '2007-12-31')
        ->description(
            "Supervised and contributed to PHP development of a company CMS product. Assisted in graphic design and database administration.",
            "Served on a contract as a software engineer for 2 years. Contributed ASP.NET/C# and Flash development. Worked with SOAP Web Services.",
            "Served on a contract as a software engineer, systems designer, database administrator, software configuration manager, and system administrator for 3 years.",
            "* Graphic design/user interface design. Front-end web development and using HTML, CSS, and JavaScript. Redesign and maintenance of a sizable intranet website.",
            "* Design and development of PHP web applications using Zend Framework, APC, and memcached. Designed and implemented complex authorization and workflow rules.",
            "* Microsoft SQL Server database schema design and maintenance. Integration of data from separate systems.",
            "* Configured Windows application and database servers; administration of Apache HTTP Server; performed application deployments.",
            "* Configured and administered revision control using Subversion. Maintained SCM systems.",
            "* Assisted with maintenance of an application using ColdFusion and Crystal Reports."
        )->build()
    ,
    JobBuilder::get()->company('TechUSA')
        ->title('Web Application Developer')
        ->address('Elkridge', 'MD', 'US')
        ->dates('2004-04-01', '2004-08-01')
        ->description(
            "Supplied experience on a contract with Zimmerman Associates to FEMA. Graphic design/user interface design. Front-end web development and using HTML, CSS, and JavaScript. Systems design and development of PHP web applications which interfaced with LDAP and other systems. MySQL database schema design and maintenance."
        )->build()
    ,
    JobBuilder::get()->company('TekSystems')
        ->title('Web Application Developer')
        ->address('Washington', 'DC', 'US')
        ->dates('2003-10-01', '2004-02-01')
        ->description(
            "Supplied experience on a contract with IBM to USDA. Served a major role in all software development life cycle stages in a project to launch a web portal including lead for planning, documentation, and development. Executed a PHP solution, supported by Linux and Apache, adhering to an extensive set of government guidelines."
        )->build()
    ,
    JobBuilder::get()->company('National Aquarium in Baltimore')
        ->title('Systems Designer')
        ->address('Baltimore', 'MD', 'US')
        ->dates('2002-09-01', '2003-03-01')
        ->description(
            "Graphic design/user interface design. Front-end web development and using HTML, CSS, and JavaScript. Maintained the corporate intranet web site. Administered Microsoft SharePoint Team Services. Authored Crystal Reports to interface with Paciolan and Epicor business data. Developed and supported ASP and PHP intranet web applications."
        )->build()
    ,
    JobBuilder::get()->company('Computer Sciences Corporation')
        ->title('Web Application Developer')
        ->address('Hanover', 'MD', 'US')
        ->dates('2000-10-01', '2002-08-01')
        ->description(
            "Lead developer of custom PHP CMS. Worked on the ANSC development team authoring dozens of applications in Java 2, Active Server Pages, and ColdFusion for Maryland state government offices including some of the following:",
            "* Maryland Department of Transportation: Development of Java 2/JSP applications interfacing with PostgreSQL.",
            "* Maryland Office of Tourism: ColdFusion development and authored Crystal Reports interfacing with SQL Server.",
            "* Maryland Department of Budget and Management: Assisted in consolidation of intranet web sites. Development of ASP/VBScript applications. Contributed WCAG/Section 508 accessibility work."
        )->build()
    ,
    JobBuilder::get()->company('National Security Agency')
        ->title('Computer Aide')
        ->address('Fort Meade', 'MD', 'US')
        ->dates('1999-09-01', '2000-06-01')
        ->description(
            "Held a government TS/SI clearance with full polygraph during internship. Served on a PKI Digital Certificate help desk, utilizing a Netscape Certificate Authority server to issue client SSL certificates. Front-end web development and using HTML, CSS, and JavaScript. Development of applications in Java and Perl."
        )->build()
    ,
    JobBuilder::get()->company('CompUSA')
        ->title('Small Business Desk / Upgrades Center Associate')
        ->address('Glen Burnie', 'MD', 'US')
        ->dates('1999-06-01', '1999-11-01')
        ->description(
            "Assisted corporate customers and consumers in placing orders for computer equipment. Analyzed PC and Mac technical problems utilizing knowledge of computer architectures, components, and peripherals."
        )->build()
];

$volunteering = [
    JobBuilder::get()->company('Caridea')
        ->title('Project Leader')
        ->url('https://github.com/search?q=caridea+user%3Alibreworks')
        ->dates('2015-05-01', $present)
        ->description(
            "Created and maintained several PHP libraries. Used Composer, PHPUnit."
        )->build()
    ,
    JobBuilder::get()->company('Stellarbase')
        ->title('Project Leader')
        ->url('https://github.com/libreworks/stellarbase')
        ->dates('2010-01-03', '2015-01-01')
        ->description(
            "Created and maintained a Java library for use with Spring Framework applications. Used JUnit, Maven."
        )->build()
    ,
    JobBuilder::get()->company('Xyster Framework')
        ->title('Project Leader')
        ->url('https://github.com/libreworks/xyster')
        ->dates('2007-05-12', '2011-02-07')
        ->description(
            "Created and maintained a PHP library for use with Zend Framework applications. Used PHPUnit, Phing."
        )->build()
    ,
    JobBuilder::get()->company('Wildfire Application Framework')
        ->title('Project Leader')
        ->url('http://sourceforge.net/projects/phpwildfire/')
        ->dates('2005-01-02', '2007-03-22')
        ->description(
            "Created and maintained a PHP library for web applications. Project is now abandoned in favor of Xyster. Used PHPUnit."
        )->build()
];

$education = [
    JobBuilder::get()->company('Anne Arundel Community College')
        ->address('Arnold', 'MD', 'US')
        ->description('Previously enrolled in Computer Science Transfer Assoc Degree.')
        ->build()
    ,
    JobBuilder::get()->company('Old Mill High School')
        ->address('Millersville', 'MD', 'US')
        ->dates('1996-08-31', '2000-05-31')
        ->description(
            'Graduated with three Anne Arundel County "Completer" statuses: Business Computers, Office Systems Management, Desktop Publishing. Coursework involving HTML, JavaScript, Visual Basic, RDBMS design, PC repair.'
        )->build()
];

$skills = [
    new SkillHeading(
        'Development\\Programming Languages',
        [
            SkillBuilder::get()->name('PHP', 'http://en.wikipedia.org/wiki/PHP')
                ->rating(4)
                ->dates('2001-01-01', '2009-08-27') // all jobs
                ->dates('2009-11-22', '2009-11-28') // beckytaka
                ->dates('2010-10-18', '2010-10-25') // xyster
                ->dates('2011-02-08', '2011-02-17') // xyster
                ->dates('2011-08-01', '2011-08-08') // nsd
                ->dates('2013-01-27', '2013-02-02') // imtm
                ->dates('2012-01-01', '2012-12-31') // padding because of infrequent use
                ->dates('2015-05-01', $present) // current job
                ->build()
            ,
            SkillBuilder::get()->name('Hack', 'https://en.wikipedia.org/wiki/Hack_%28programming_language%29')
                ->rating(3)
                ->dates('2015-05-01', '2017-02-28')
                ->build()
            ,
            SkillBuilder::get()->name('JavaScript / DOM', 'https://en.wikipedia.org/wiki/JavaScript')
                ->rating(4)
                ->dates('1998-09-01', $present)
                ->build()
            ,
            SkillBuilder::get()->name('Java (Java EE, JSP)', 'https://en.wikipedia.org/wiki/Java')
                ->rating(3)
                ->dates('1999-09-01', '2000-06-01')
                ->dates('2001-01-01', '2001-07-01')
                ->dates('2008-08-01', '2014-12-26')
                ->build()
            ,
            SkillBuilder::get()->name('Groovy', 'https://en.wikipedia.org/wiki/Groovy%20(programming%20language)')
                ->rating(3)
                ->dates('2011-10-31', '2014-12-02')
                ->build()
            ,
            SkillBuilder::get()->name('Perl', 'https://en.wikipedia.org/wiki/Perl')
                ->rating(1)
                ->dates('1999-09-01', '2000-02-02')
                ->dates('2015-06-14', '2015-09-21')
                ->build()
            ,
            SkillBuilder::get()->name('Bash', 'https://en.wikipedia.org/wiki/Bash_(Unix_shell)')
                ->rating(1)
                ->dates('2014-09-21', '2016-09-21')
                ->dates('2017-04-17', $present)
                ->build()
            ,
            SkillBuilder::get()->name('SQL', 'https://en.wikipedia.org/wiki/Structured_Query_Language')
                ->rating(3)
                ->dates('2000-10-01', $present)
                ->build()
            ,
            SkillBuilder::get()->name('Regular expressions', 'https://en.wikipedia.org/wiki/Regular_expression')
                ->rating(3)
                ->dates('2000-01-01', $present)
                ->build()
            ,
            SkillBuilder::get()->name('ASP.NET / C#', 'https://en.wikipedia.org/wiki/C%20Sharp%20(programming%20language)')
                ->rating(2)
                ->dates('2004-01-01', '2006-01-01')
                ->build()
            ,
        ]
    ),
    new SkillHeading(
        'Development\\Frameworks / Platforms',
        [
            new Skill(new Tag('http://en.wikipedia.org/wiki/Dojo_Toolkit', 'Dojo Toolkit')),
            new Skill(new Tag('http://en.wikipedia.org/wiki/Spring_Framework', 'Spring Framework')),
            new Skill(new Tag('http://en.wikipedia.org/wiki/Hibernate_(Java)', 'Hibernate')),
            new Skill(new Tag('http://en.wikipedia.org/wiki/Grails', 'Grails')),
            new Skill(new Tag('http://en.wikipedia.org/wiki/Zend_Framework', 'Zend Framework')),
            new Skill(new Tag('http://en.wikipedia.org/wiki/Symfony', 'Symfony')),
            new Skill(new Tag('http://en.wikipedia.org/wiki/Drupal', 'Drupal')),
        ]
    ),
    new SkillHeading(
        'Development\\Markup Languages / Other Standards',
        [
            SkillBuilder::get()->name('HTML (XHTML, HTML5)', 'http://en.wikipedia.org/wiki/HTML')
                ->rating(4)
                ->dates('1997-09-01', $present)
                ->build()
            ,
            SkillBuilder::get()->name('CSS', 'http://en.wikipedia.org/wiki/CSS')
                ->rating(4)
                ->dates('1999-09-01', $present)
                ->build()
            ,
            SkillBuilder::get()->name('XML', 'http://en.wikipedia.org/wiki/XML')
                ->rating(3)
                ->dates('2002-01-01', $present)
                ->build()
            ,
            SkillBuilder::get()->name('WAI-WCAG / Section 508', 'http://en.wikipedia.org/wiki/Web Content Accessibility Guidelines')
                ->rating(3)
                ->dates('2001-01-01', $present)
                ->build()
            ,
            SkillBuilder::get()->name('ARIA', 'http://en.wikipedia.org/wiki/WAI-ARIA')
                ->rating(2)
                ->dates('2011-10-31', $present)
                ->build()
            ,
            SkillBuilder::get()->name('REST', 'http://en.wikipedia.org/wiki/Representational_State_Transfer')
                ->rating(3)
                ->dates('2009-02-01', $present)
                ->build()
        ]
    ),
    new SkillHeading(
        'Development\\Revision Control',
        [
            new Skill(new Tag('http://en.wikipedia.org/wiki/Git_(software)', 'Git')),
            new Skill(new Tag('http://en.wikipedia.org/wiki/Apache_Subversion', 'Subversion')),
            new Skill(new Tag('http://en.wikipedia.org/wiki/Concurrent_Versions_System', 'CVS')),
        ]
    ),
    new SkillHeading(
        'Development\\Unit Testing',
        [
            new Skill(new Tag("http://en.wikipedia.org/wiki/PHPUnit", 'PHPUnit')),
            new Skill(new Tag("https://github.com/HackPack/HackUnit", 'HackUnit')),
            new Skill(new Tag("http://en.wikipedia.org/wiki/JUnit", 'JUnit'))
        ]
    ),
    new SkillHeading(
        'Development\\Build Tools',
        [
            new Skill(new Tag("https://en.wikipedia.org/wiki/Composer_%28software%29", 'Composer')),
            new Skill(new Tag("https://en.wikipedia.org/wiki/Broccoli_%28build_tool%29", 'Broccoli')),
            new Skill(new Tag("http://en.wikipedia.org/wiki/Jenkins_%28software%29", 'Jenkins')),
            new Skill(new Tag("http://en.wikipedia.org/wiki/Apache Maven", 'Maven')),
            new Skill(new Tag("http://en.wikipedia.org/wiki/Apache Ant", 'Ant')),
            new Skill(new Tag("http://en.wikipedia.org/wiki/Phing", 'Phing')),
        ]
    ),
    new SkillHeading(
        'Databases\\Relational',
        [
            new Skill(new Tag("http://en.wikipedia.org/wiki/PostgreSQL", 'PostgreSQL'), 2, [
                new Period(new \DateTime('2001-01-01'), new \DateTime('2001-07-01')),
                new Period(new \DateTime('2008-01-01'), $present)
            ]),
            new Skill(new Tag("http://en.wikipedia.org/wiki/MySQL", 'MySQL'), 2, [
                new Period(new \DateTime('2001-01-01'), new \DateTime('2008-01-01'))
            ]),
            new Skill(new Tag('http://en.wikipedia.org/wiki/Microsoft SQL Server', 'Microsoft SQL Server'), 2, [
                new Period(new \DateTime('2001-01-01'), new \DateTime('2001-07-01')),
                new Period(new \DateTime('2005-05-01'), new \DateTime('2007-12-31')),
                new Period(new \DateTime('2008-08-01'), new \DateTime('2011-08-01'))
            ]),
            new Skill(new Tag("http://en.wikipedia.org/wiki/Oracle Database", 'Oracle Database')),
            new Skill(new Tag("http://en.wikipedia.org/wiki/IBM DB2", 'IBM DB2')),
            new Skill(new Tag("http://en.wikipedia.org/wiki/SQLite", 'SQLite')),
        ]
    ),
    new SkillHeading(
        'Databases\\NoSQL',
        [
            new Skill(new Tag("http://en.wikipedia.org/wiki/MongoDB", 'MongoDB')),
            new Skill(new Tag("http://en.wikipedia.org/wiki/Memcached", 'Memcached'))
        ]
    ),
    new SkillHeading(
        'Databases\\Directory',
        [
            new Skill(new Tag("http://en.wikipedia.org/wiki/OpenLDAP", 'OpenLDAP'))
        ]
    ),
    new SkillHeading(
        'Hardware\\Amazon Web Services',
        [
            // new DateTime('2011-03-18')
            new Skill('EC2'), new Skill('ECS'), new Skill('S3'), new Skill('RDS'),
            new Skill('ElastiCache'), new Skill('VPC'), new Skill('Route 53'),
            new Skill('KMS'), new Skill('SES'), new Skill('CodeDeploy'),
        ]
    ),
    new SkillHeading(
        'Hardware\\Virtualization / Containers',
        [
            new Skill(new Tag("http://en.wikipedia.org/wiki/Docker_(software)", "Docker")),
            new Skill(new Tag("http://en.wikipedia.org/wiki/Kubernetes", "Kubernetes")),
            new Skill(new Tag("http://en.wikipedia.org/wiki/OpenVZ", "OpenVZ")),
            new Skill(new Tag("http://en.wikipedia.org/wiki/VirtualBox", "VirtualBox")),
            new Skill(new Tag("http://en.wikipedia.org/wiki/Xen", "Xen"))
        ]
    ),
    new SkillHeading(
        'Hardware\\Public Key Infrastructure',
        [
            new Skill(new Tag("http://en.wikipedia.org/wiki/X.509", 'Request, issue, and install of X.509 Certificates'))
        ]
    ),
    new SkillHeading(
        'Hardware\\Hardware',
        [
            new Skill(new Tag("https://en.wikipedia.org/wiki/Computer_hardware", 'PC construction and repair')),
            new Skill(new Tag("https://en.wikipedia.org/wiki/RAID", 'Hardware/software RAID setup')),
        ]
    ),
    new SkillHeading(
        'Hardware\\System Administration',
        [
            new Skill(new Tag("https://en.wikipedia.org/wiki/Linux", 'GNU/Linux (Debian, Ubuntu, Red Hat)')),
        ]
    ),
    new SkillHeading(
        'Hardware\\Mail Server Administration',
        [
            new Skill(new Tag("http://en.wikipedia.org/wiki/Courier Mail Server", "Courier")),
            new Skill(new Tag("http://en.wikipedia.org/wiki/Postfix", "Postfix")),
            new Skill(new Tag("http://en.wikipedia.org/wiki/Zimbra", "Zimbra"))
        ]
    ),
    new SkillHeading(
        'Hardware\\Application Server Administration',
        [
            new Skill(new Tag("http://en.wikipedia.org/wiki/Apache HTTP Server", "Apache HTTP Server")),
            new Skill(new Tag("http://en.wikipedia.org/wiki/Apache_Tomcat", "Apache Tomcat")),
            new Skill(new Tag("http://en.wikipedia.org/wiki/nginx", "nginx")),
            new Skill(new Tag("http://en.wikipedia.org/wiki/Lighttpd", "Lighttpd")),
            new Skill(new Tag("http://en.wikipedia.org/wiki/HHVM", "HHVM")),
        ]
    )
];

$di = $present->diff(new \DateTime('1999-09-01'));
$devYears = $di->y + ($di->m > 6 ? 1 : 0);
$di = $present->diff(new \DateTime('1997-09-01'));
$webYears = $di->y + ($di->m > 6 ? 1 : 0);

$resume = new Libreworks\Microformats\Resume(
    "Jonathan D. Hawk",
    "Principal Software Architect and DevOps engineer. $devYears years experience in software development. $webYears years experience in web design and development. A fast learner and strong leader. Excellent communication and customer support skills. Impassioned about standards compliance, web accessibility, software development, and free and open source software. Types 95–105 WPM on the dvorak keyboard layout.",
    $card,
    $education,
    $experience,
    $volunteering,
    $skills
);

$skillTableWriter = new Doublecompile\Resume\SkillTableWriter();
$skillListWriter = new Doublecompile\Resume\SkillListWriter();
$eventWriter = new Doublecompile\Resume\EventWriter($present);
$cw = new Doublecompile\Resume\CardWriter();

?><!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
		<meta charset="utf-8">
		<title><?= $resume->getName() ?>'s Résumé</title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="//oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <link rel="stylesheet" href="//oss.maxcdn.com/normalize/3.0.3/normalize.min.css"></script>
		<link rel="stylesheet" href="styles.css"/>
	</head>
	<body>
		<main id="resume" role="main" class="h-resume">
<!--
 | Congratulations! You're reading my the source of résumé.
 | You will see that I've used the "h-resume" microformat.
 -->
            <div class="hidden p-name">Jonathan D. Hawk</div>
			<address class="p-contact h-card">
                <?= $cw->write($resume->getContact()) ?>
			</address>

            <div class="p-summary">
                <!-- Experience with:
				graphic design and web design since 1997,
				enterprise software development since 1999,
				relational database design and administration since 2000,
				system administration since 2002,
				software configuration management since 2004,
				systems design since 2004.
				-->
                <p><?= htmlspecialchars($resume->getSummary()) ?></p>
            </div>

			<div class="golden-columns">
				<div class="column">

					<section id="skills">
						<h2>Skills</h2>
						<div id="skills-dev">
							<h3>Development</h3>
							<dl>
                                <?php foreach ($resume->getSkillHeadings() as $sh): ?>
                                <?php if (substr($sh->getName(), 0, 12) == 'Development\\'): ?>
                                <dt><?=substr($sh->getName(), 12)?></dt>
                                <dd>
                                    <?php
                                        if ($sh->getName() == 'Development\\Programming Languages' || $sh->getName() == 'Development\\Markup Languages / Other Standards') {
                                            echo $skillTableWriter->write($sh->getSkills());
                                        } else {
                                            echo $skillListWriter->write($sh->getSkills());
                                        }
                                    ?>
                                </dd>
                                <?php endif; ?>
                                <?php endforeach; ?>
							</dl>
						</div>

						<div id="skills-db">
							<h3>Databases</h3>
							<dl>
                                <?php foreach ($resume->getSkillHeadings() as $sh): ?>
                                <?php if (substr($sh->getName(), 0, 10) == 'Databases\\'): ?>
                                <dt><?=substr($sh->getName(), 10)?></dt>
                                <dd>
                                    <?= $skillListWriter->write($sh->getSkills()) ?>
                                </dd>
                                <?php endif; ?>
                                <?php endforeach; ?>

							</dl>
						</div>

						<div id="skills-comp">
							<h3>Operations</h3>
							<dl>
                                <?php foreach ($resume->getSkillHeadings() as $sh): ?>
                                <?php if (substr($sh->getName(), 0, 9) == 'Hardware\\'): ?>
                                <dt><?=substr($sh->getName(), 9)?></dt>
                                <dd>
                                    <?= $skillListWriter->write($sh->getSkills()) ?>
                                </dd>
                                <?php endif; ?>
                                <?php endforeach; ?>
							</dl>
						</div>
					</section>

					<!-- ?education=1 to see education -->
					<?php if (isset($_GET['education'])): ?>
					<section id="education">
						<h2>Education</h2>
						<ol>
                            <?php foreach ($resume->getEducation() as $exp): ?>
                            <li class="p-education h-event">
                                <?=$eventWriter->write($exp)?>
                            </li>
                            <?php endforeach; ?>
						</ol>
					</section>
					<?php endif; ?>

					<section id="volunteering">
						<h2>Open Source Contributions</h2>
						<ol>
                            <?php foreach ($resume->getVolunteering() as $exp): ?>
                            <li class="p-experience h-event">
                                <?=$eventWriter->write($exp)?>
                            </li>
                            <?php endforeach; ?>
						</ol>
					</section>

				</div>
				<div class="column">

					<section id="work">
						<h2>Professional Experience</h2>
						<ol>
                            <?php foreach ($resume->getExperience() as $exp): ?>
                            <li class="p-experience h-event">
                                <?=$eventWriter->write($exp)?>
                            </li>
                            <?php endforeach; ?>
						</ol>
					</section>

				</div>
			</div>
		</main>
	</body>
</html>
