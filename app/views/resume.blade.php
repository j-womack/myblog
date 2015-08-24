@extends('layouts.master')

@section('title')
Resume
@stop

@section('content')
<div class="container">
    <div id="header">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1>Joshua Womack</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 text-center">1513 E. 29th Street, Mission, TX 78574</div>
            <div class="col-md-4 text-center">womack.joshua@gmail.com</div>
            <div class="col-md-4 text-center">(956) 358-1273</div>
        </div>
        <hr>
        <div id="summary">
            <h2>Summary</h2>
            <ul>
                Recent graduate with a Bachelors of Science in Applied Mathematics. Goal-oriented and highly organized with the ability to meet deadlines and manage multiple tasks simultaneously.
            </ul>
        </div>
    </div>

    <div id="education">
        <h2>Education</h2>
        <p>
        <h3>Bachelor of Science (Applied Mathematics)</h3>
        <div class="row">
            <div class="col-md-9">
                <h4>University of Texas Pan American</h4>
            </div>
            <div class="row">
                <div class="col-md-3 text-right">
                    Edinburg, TX
                </div>
                <div class="col-md-3 text-right">
                    May 2013
                </div>
            </div>
        </div>
        Key coursework:
        <ul>
            <li>Elementary Cryptology</li>
            <li>Linear Algebra</li>
            <li>Probability & Statistics</li>
        </ul>
        </p>
    </div>

    <div id="experience">
        <h2>Experience</h2>
        <p>
            <h3>Texas Citrus Development Corporation</h3>
            <div class="row">
                <div class="col-md-9">
                    <h4>Computer Consultant</h4>
                </div>
                <div class="row">
                    <div class="col-md-3 text-right">
                        McAllen, TX
                    </div>
                    <div class="col-md-3 text-right">
                        May 2008 - May 2015
                    </div>
                </div>
            </div>
            <ul>
                <li>Responsible for maintaining internal computer network</li>
                <li>Assisted office personnel in software problems and applications.</li>
            </ul>
        </p>
        <p>
            <div class="row">
                <div class="col-md-9">
                    <h3>Private Tutor</h3>
                </div>
                <div class="row">
                    <div class="col-md-3 text-right">
                        Mission, TX
                    </div>
                    <div class="col-md-3 text-right">
                        May 2008 - May 2012
                    </div>
                </div>
            </div>
            <ul>
                <li>Tutored students at the high school and college level in a variety of Math courses including Calculus, Trigonometry and various levels of Algebra.</li>
            </ul>
        </p>    
        <p>
            <h3>Jitterz Coffee Bar</h3>
            <div class="row">
                <div class="col-md-9">
                    <h4><em>Barista</em></h4>
                </div>
                <div class="row">
                    <div class="col-md-3 text-right">
                        Mission, TX
                    </div>
                    <div class="col-md-3 text-right">
                        June 2010 - June 2012
                    </div>
                </div>
            </div>
            <ul>
                <li>Interaction with customers on the front end.</li>
                <li>Communication with coworkers to ensure expeditious preparation and delivery of drinks.</li>
            </ul>
            <div class="row">
                <div class="col-md-9">
                    <h4><em>Manager</em></h4>
                </div>
                <div class="row">
                    <div class="col-md-3 text-right">
                        Mission, TX
                    </div>
                    <div class="col-md-3 text-right">
                        June 2012 - May 2015
                    </div>
                </div>
            </div>
            <ul>
                <li>Effectively manage the team of baristas to ensure the highest consistent quality of product.</li>
                <li>Developed the training protocol for new employees and served as Head Barista in charge of training new employees.</li>
            </ul>
            <div class="row">
                <div class="col-md-9">
                    <h4><em>Roaster</em></h4>
                </div>
                <div class="row">
                    <div class="col-md-3 text-right">
                        Mission, TX
                    </div>
                    <div class="col-md-3 text-right">
                        August 2013 - May 2015
                    </div>
                </div>
            </div>
            <ul>
                <li>Responsible for roasting all of the coffee beans, keeping track of inventory, and placing orders as needed.</li>
                <li>Managed wholesale accounts for bulk coffee beans. Responsibilities included taking orders, roasting to fill them and meet deadlines, making invoices, etc.</li>
            </ul>
        </p>
    </div>

    <div id="related_skills">
        <h2>Related Skills</h2>
        <ul>
            <li>Achieve results through an unrelenting work ethic</li>
            <li>Build team success through passion, information, and relationship cultivation </li>
            <li>Communicate effectively in small and large groups and public speaking environments </li>
        </ul>
    </div>
    <div id="personal">
        <h2>Personal</h2>
        <ul>Avid book reader and musician</ul>
    </div>
    <p>
        <h4><em>References available on request</em></h4>
    </p>
</div>
@stop
