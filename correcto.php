<?php 
    include 'include/header.php';
    include 'include/top-menu.php'; 
    include 'include/left-menu.php'; 
?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">

<!-- BEGIN CONTENT -->
<!-- <div class="pusher"> -->
<div id="app" class="ui basic segment">
    <!-- El Contenido comienza aqui -->
    <div class="g-contenido">
        <div class="ui masthead vertical segment">
            <div class="ui container" id="idDivBody">
                <div class="introduction">
                    <h2 class="ui dividing header ui purple">
                        Correcto
                    </h2>

                    <div class="ui hidden divider"></div>

                    <div class="ui right floated main menu">
                        <button id="btnNuevoConvenio" class="ui primary button" data-command="ALTA"><i
                                class="fa fa-plus"></i>
                            Nuevo convenio
                        </button>
                    </div>

                </div>

            </div>
        </div>
        <div class="main ui container">

                    <!-- <h2 class="ui dividing header">Types<a class="anchor" id="types"></a></h2> -->

                    <div class="example">
                       
                        <table class="ui celled table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Age</th>
                                    <th>Job</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td data-label="Name">James</td>
                                    <td data-label="Age">24</td>
                                    <td data-label="Job">Engineer</td>
                                </tr>
                                <tr>
                                    <td data-label="Name">Jill</td>
                                    <td data-label="Age">26</td>
                                    <td data-label="Job">Engineer</td>
                                </tr>
                                <tr>
                                    <td data-label="Name">Elyse</td>
                                    <td data-label="Age">24</td>
                                    <td data-label="Job">Designer</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="another example">

                        <i class="fitted icon code"></i>
                        <div class="html ui top attached segment">
                            <table class="ui celled padded table">
                                <thead>
                                    <tr>
                                        <th class="single line">Evidence Rating</th>
                                        <th>Effect</th>
                                        <th>Efficacy</th>
                                        <th>Consensus</th>
                                        <th>Comments</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <h2 class="ui center aligned header">A</h2>
                                        </td>
                                        <td class="single line">
                                            Power Output
                                        </td>
                                        <td>
                                            <div class="ui yellow rating disabled" data-rating="3" data-max-rating="3">
                                                <i class="star icon active"></i><i class="star icon active"></i><i
                                                    class="star icon active"></i></div>
                                        </td>
                                        <td class="right aligned">
                                            80% <br>
                                            <a href="#">18 studies</a>
                                        </td>
                                        <td>Creatine supplementation is the reference compound for increasing muscular
                                            creatine levels; there is variability in this increase, however, with some
                                            nonresponders.</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h2 class="ui center aligned header">A</h2>
                                        </td>
                                        <td class="single line">
                                            Weight
                                        </td>
                                        <td>
                                            <div class="ui yellow rating disabled" data-rating="3" data-max-rating="3">
                                                <i class="star icon active"></i><i class="star icon active"></i><i
                                                    class="star icon active"></i></div>
                                        </td>
                                        <td class="right aligned">
                                            100% <br>
                                            <a href="#">65 studies</a>
                                        </td>
                                        <td>Creatine is the reference compound for power improvement, with numbers from
                                            one meta-analysis to assess potency</td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="5">
                                            <div class="ui right floated pagination menu">
                                                <a class="icon item">
                                                    <i class="left chevron icon"></i>
                                                </a>
                                                <a class="item">1</a>
                                                <a class="item">2</a>
                                                <a class="item">3</a>
                                                <a class="item">4</a>
                                                <a class="icon item">
                                                    <i class="right chevron icon"></i>
                                                </a>
                                            </div>
                                        </th>
                                    </tr>
                                </tfoot>
                            </table>
                            <div class="ui top attached label">Example <i data-content="Copy code"
                                    class="copy link icon"></i></div>
                        </div>
                        <div class="annotation transition visible" style="display: block !important;">
                            <div class="ui instructive bottom attached segment">
                                <pre><code class="code xml"><span class="tag">&lt;<span class="title">table</span> <span class="attribute">class</span>=<span class="value">"ui celled padded table"</span>&gt;</span>
    <span class="tag">&lt;<span class="title">thead</span>&gt;</span>
      <span class="tag">&lt;<span class="title">tr</span>&gt;</span><span class="tag">&lt;<span class="title">th</span> <span class="attribute">class</span>=<span class="value">"single line"</span>&gt;</span>Evidence Rating<span class="tag">&lt;/<span class="title">th</span>&gt;</span>
      <span class="tag">&lt;<span class="title">th</span>&gt;</span>Effect<span class="tag">&lt;/<span class="title">th</span>&gt;</span>
      <span class="tag">&lt;<span class="title">th</span>&gt;</span>Efficacy<span class="tag">&lt;/<span class="title">th</span>&gt;</span>
      <span class="tag">&lt;<span class="title">th</span>&gt;</span>Consensus<span class="tag">&lt;/<span class="title">th</span>&gt;</span>
      <span class="tag">&lt;<span class="title">th</span>&gt;</span>Comments<span class="tag">&lt;/<span class="title">th</span>&gt;</span>
    <span class="tag">&lt;/<span class="title">tr</span>&gt;</span><span class="tag">&lt;/<span class="title">thead</span>&gt;</span>
    <span class="tag">&lt;<span class="title">tbody</span>&gt;</span>
      <span class="tag">&lt;<span class="title">tr</span>&gt;</span>
        <span class="tag">&lt;<span class="title">td</span>&gt;</span>
          <span class="tag">&lt;<span class="title">h2</span> <span class="attribute">class</span>=<span class="value">"ui center aligned header"</span>&gt;</span>A<span class="tag">&lt;/<span class="title">h2</span>&gt;</span>
        <span class="tag">&lt;/<span class="title">td</span>&gt;</span>
        <span class="tag">&lt;<span class="title">td</span> <span class="attribute">class</span>=<span class="value">"single line"</span>&gt;</span>
          Power Output
        <span class="tag">&lt;/<span class="title">td</span>&gt;</span>
        <span class="tag">&lt;<span class="title">td</span>&gt;</span>
          <span class="tag">&lt;<span class="title">div</span> <span class="attribute">class</span>=<span class="value">"ui yellow rating"</span> <span class="attribute">data-rating</span>=<span class="value">"3"</span> <span class="attribute">data-max-rating</span>=<span class="value">"3"</span>&gt;</span><span class="tag">&lt;/<span class="title">div</span>&gt;</span>
        <span class="tag">&lt;/<span class="title">td</span>&gt;</span>
        <span class="tag">&lt;<span class="title">td</span> <span class="attribute">class</span>=<span class="value">"right aligned"</span>&gt;</span>
          80% <span class="tag">&lt;<span class="title">br</span>&gt;</span>
          <span class="tag">&lt;<span class="title">a</span> <span class="attribute">href</span>=<span class="value">"#"</span>&gt;</span>18 studies<span class="tag">&lt;/<span class="title">a</span>&gt;</span>
        <span class="tag">&lt;/<span class="title">td</span>&gt;</span>
        <span class="tag">&lt;<span class="title">td</span>&gt;</span>Creatine supplementation is the reference compound for increasing muscular creatine levels; there is variability in this increase, however, with some nonresponders.<span class="tag">&lt;/<span class="title">td</span>&gt;</span>
      <span class="tag">&lt;/<span class="title">tr</span>&gt;</span>
      <span class="tag">&lt;<span class="title">tr</span>&gt;</span>
        <span class="tag">&lt;<span class="title">td</span>&gt;</span>
          <span class="tag">&lt;<span class="title">h2</span> <span class="attribute">class</span>=<span class="value">"ui center aligned header"</span>&gt;</span>A<span class="tag">&lt;/<span class="title">h2</span>&gt;</span>
        <span class="tag">&lt;/<span class="title">td</span>&gt;</span>
        <span class="tag">&lt;<span class="title">td</span> <span class="attribute">class</span>=<span class="value">"single line"</span>&gt;</span>
          Weight
        <span class="tag">&lt;/<span class="title">td</span>&gt;</span>
        <span class="tag">&lt;<span class="title">td</span>&gt;</span>
          <span class="tag">&lt;<span class="title">div</span> <span class="attribute">class</span>=<span class="value">"ui yellow rating"</span> <span class="attribute">data-rating</span>=<span class="value">"3"</span> <span class="attribute">data-max-rating</span>=<span class="value">"3"</span>&gt;</span><span class="tag">&lt;/<span class="title">div</span>&gt;</span>
        <span class="tag">&lt;/<span class="title">td</span>&gt;</span>
        <span class="tag">&lt;<span class="title">td</span> <span class="attribute">class</span>=<span class="value">"right aligned"</span>&gt;</span>
          100% <span class="tag">&lt;<span class="title">br</span>&gt;</span>
          <span class="tag">&lt;<span class="title">a</span> <span class="attribute">href</span>=<span class="value">"#"</span>&gt;</span>65 studies<span class="tag">&lt;/<span class="title">a</span>&gt;</span>
        <span class="tag">&lt;/<span class="title">td</span>&gt;</span>
        <span class="tag">&lt;<span class="title">td</span>&gt;</span>Creatine is the reference compound for power improvement, with numbers from one meta-analysis to assess potency<span class="tag">&lt;/<span class="title">td</span>&gt;</span>
      <span class="tag">&lt;/<span class="title">tr</span>&gt;</span>
    <span class="tag">&lt;/<span class="title">tbody</span>&gt;</span>
    <span class="tag">&lt;<span class="title">tfoot</span>&gt;</span>
      <span class="tag">&lt;<span class="title">tr</span>&gt;</span><span class="tag">&lt;<span class="title">th</span> <span class="attribute">colspan</span>=<span class="value">"5"</span>&gt;</span>
        <span class="tag">&lt;<span class="title">div</span> <span class="attribute">class</span>=<span class="value">"ui right floated pagination menu"</span>&gt;</span>
          <span class="tag">&lt;<span class="title">a</span> <span class="attribute">class</span>=<span class="value">"icon item"</span>&gt;</span>
            <span class="tag">&lt;<span class="title">i</span> <span class="attribute">class</span>=<span class="value">"left chevron icon"</span>&gt;</span><span class="tag">&lt;/<span class="title">i</span>&gt;</span>
          <span class="tag">&lt;/<span class="title">a</span>&gt;</span>
          <span class="tag">&lt;<span class="title">a</span> <span class="attribute">class</span>=<span class="value">"item"</span>&gt;</span>1<span class="tag">&lt;/<span class="title">a</span>&gt;</span>
          <span class="tag">&lt;<span class="title">a</span> <span class="attribute">class</span>=<span class="value">"item"</span>&gt;</span>2<span class="tag">&lt;/<span class="title">a</span>&gt;</span>
          <span class="tag">&lt;<span class="title">a</span> <span class="attribute">class</span>=<span class="value">"item"</span>&gt;</span>3<span class="tag">&lt;/<span class="title">a</span>&gt;</span>
          <span class="tag">&lt;<span class="title">a</span> <span class="attribute">class</span>=<span class="value">"item"</span>&gt;</span>4<span class="tag">&lt;/<span class="title">a</span>&gt;</span>
          <span class="tag">&lt;<span class="title">a</span> <span class="attribute">class</span>=<span class="value">"icon item"</span>&gt;</span>
            <span class="tag">&lt;<span class="title">i</span> <span class="attribute">class</span>=<span class="value">"right chevron icon"</span>&gt;</span><span class="tag">&lt;/<span class="title">i</span>&gt;</span>
          <span class="tag">&lt;/<span class="title">a</span>&gt;</span>
        <span class="tag">&lt;/<span class="title">div</span>&gt;</span>
      <span class="tag">&lt;/<span class="title">th</span>&gt;</span>
    <span class="tag">&lt;/<span class="title">tr</span>&gt;</span><span class="tag">&lt;/<span class="title">tfoot</span>&gt;</span>
  <span class="tag">&lt;/<span class="title">table</span>&gt;</span></code></pre>
                            </div>
                        </div>
                    </div>
                    <div class="another example">
                        <i class="fitted icon code"></i>
                        <table class="ui very basic collapsing celled table">
                            <thead>
                                <tr>
                                    <th>Employee</th>
                                    <th>Correct Guesses</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <h4 class="ui image header">
                                            <img src="/images/avatar2/small/lena.png" class="ui mini rounded image">
                                            <div class="content">
                                                Lena
                                                <div class="sub header">Human Resources
                                                </div>
                                            </div>
                                        </h4>
                                    </td>
                                    <td>
                                        22
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h4 class="ui image header">
                                            <img src="/images/avatar2/small/matthew.png" class="ui mini rounded image">
                                            <div class="content">
                                                Matthew
                                                <div class="sub header">Fabric Design
                                                </div>
                                            </div>
                                        </h4>
                                    </td>
                                    <td>
                                        15
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h4 class="ui image header">
                                            <img src="/images/avatar2/small/lindsay.png" class="ui mini rounded image">
                                            <div class="content">
                                                Lindsay
                                                <div class="sub header">Entertainment
                                                </div>
                                            </div>
                                        </h4>
                                    </td>
                                    <td>
                                        12
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h4 class="ui image header">
                                            <img src="/images/avatar2/small/mark.png" class="ui mini rounded image">
                                            <div class="content">
                                                Mark
                                                <div class="sub header">Executive
                                                </div>
                                            </div>
                                        </h4>
                                    </td>
                                    <td>
                                        11
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="another example">
                        <i class="fitted icon code"></i>
                        <table class="ui celled striped table">
                            <thead>
                                <tr>
                                    <th colspan="3">
                                        Git Repository
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="collapsing">
                                        <i class="folder icon"></i> node_modules
                                    </td>
                                    <td>Initial commit</td>
                                    <td class="right aligned collapsing">10 hours ago</td>
                                </tr>
                                <tr>
                                    <td>
                                        <i class="folder icon"></i> test
                                    </td>
                                    <td>Initial commit</td>
                                    <td class="right aligned">10 hours ago</td>
                                </tr>
                                <tr>
                                    <td>
                                        <i class="folder icon"></i> build
                                    </td>
                                    <td>Initial commit</td>
                                    <td class="right aligned">10 hours ago</td>
                                </tr>
                                <tr>
                                    <td>
                                        <i class="file outline icon"></i> package.json
                                    </td>
                                    <td>Initial commit</td>
                                    <td class="right aligned">10 hours ago</td>
                                </tr>
                                <tr>
                                    <td>
                                        <i class="file outline icon"></i> Gruntfile.js
                                    </td>
                                    <td>Initial commit</td>
                                    <td class="right aligned">10 hours ago</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="example">
                        <h4 class="ui header" id="definition"><a href="#definition"><i
                                    class="fitted small linkify icon"></i>Definition</a></h4>
                        <i class="fitted icon code"></i>
                        <p>A table may be formatted to emphasize a first column that defines a rows content</p>
                        <div class="ui ignored info message">Definition tables are designed to display on a single
                            background color. You can adjust this by changing <code>@definitionPageBackground</code>, or
                            specifying a background color on the first cell</div>
                        <table class="ui definition table">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Arguments</th>
                                    <th>Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>reset rating</td>
                                    <td>None</td>
                                    <td>Resets rating to default value</td>
                                </tr>
                                <tr>
                                    <td>set rating</td>
                                    <td>rating (integer)</td>
                                    <td>Sets the current star rating to specified value</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="another example">
                        <i class="fitted icon code"></i>
                        <table class="ui compact celled definition table">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Name</th>
                                    <th>Registration Date</th>
                                    <th>E-mail address</th>
                                    <th>Premium Plan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="collapsing">
                                        <div class="ui fitted slider checkbox">
                                            <input type="checkbox" tabindex="0" class="hidden"> <label></label>
                                        </div>
                                    </td>
                                    <td>John Lilki</td>
                                    <td>September 14, 2013</td>
                                    <td>jhlilk22@yahoo.com</td>
                                    <td>No</td>
                                </tr>
                                <tr>
                                    <td class="collapsing">
                                        <div class="ui fitted slider checkbox">
                                            <input type="checkbox" tabindex="0" class="hidden"> <label></label>
                                        </div>
                                    </td>
                                    <td>Jamie Harington</td>
                                    <td>January 11, 2014</td>
                                    <td>jamieharingonton@yahoo.com</td>
                                    <td>Yes</td>
                                </tr>
                                <tr>
                                    <td class="collapsing">
                                        <div class="ui fitted slider checkbox">
                                            <input type="checkbox" tabindex="0" class="hidden"> <label></label>
                                        </div>
                                    </td>
                                    <td>Jill Lewis</td>
                                    <td>May 11, 2014</td>
                                    <td>jilsewris22@yahoo.com</td>
                                    <td>Yes</td>
                                </tr>
                            </tbody>
                            <tfoot class="full-width">
                                <tr>
                                    <th></th>
                                    <th colspan="4">
                                        <div class="ui right floated small primary labeled icon button">
                                            <i class="user icon"></i> Add User
                                        </div>
                                        <div class="ui small button">
                                            Approve
                                        </div>
                                        <div class="ui small  disabled button">
                                            Approve All
                                        </div>
                                    </th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                    <div class="ui info message">If you work with the <code>rowspan</code> table technique, fomantic
                        provides a helper class <code>rowspanned</code> to be used for an invisible <code>td</code>
                        column to make sure the styling stays consistent</div>
                    <div class="another example">
                        <i class="fitted icon code"></i>
                        <table class="ui definition table">
                            <tbody>
                                <tr>
                                    <td rowspan="2">Category rowspanned</td>
                                    <td>Row one</td>
                                </tr>
                                <tr>
                                    <td class="rowspanned"></td>
                                    <td>Row two</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="example">
                        <h4 class="ui header" id="structured"><a href="#structured"><i
                                    class="fitted small linkify icon"></i>Structured</a></h4>
                        <i class="fitted icon code"></i>
                        <p>A table can be formatted to display complex structured data</p>

                        <div class="ui ignored info message">
                            <p>UI tables use <code>border-collapse: separate</code> to allow for tables to receive
                                styles that cannot usually be applied to tables like <code>border-radius</code>. However
                                this can cause some cell borders to appear missing with complex layouts that use
                                <code>rowspan</code> or <code>colspan</code> and rows with varying column count.</p>
                            <p><code>ui structured table</code> does not support some style features, but can correctly
                                display all valid HTML table content.</p>
                        </div>

                        <table class="ui celled structured table">
                            <thead>
                                <tr>
                                    <th rowspan="2">Name</th>
                                    <th rowspan="2">Type</th>
                                    <th rowspan="2">Files</th>
                                    <th colspan="3">Languages</th>
                                </tr>
                                <tr>
                                    <th>Ruby</th>
                                    <th>JavaScript</th>
                                    <th>Python</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Alpha Team</td>
                                    <td>Project 1</td>
                                    <td class="right aligned">2</td>
                                    <td class="center aligned">
                                        <i class="large green checkmark icon"></i>
                                    </td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td rowspan="3">Beta Team</td>
                                    <td>Project 1</td>
                                    <td class="right aligned">52</td>
                                    <td class="center aligned">
                                        <i class="large green checkmark icon"></i>
                                    </td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Project 2</td>
                                    <td class="right aligned">12</td>
                                    <td></td>
                                    <td class="center aligned">
                                        <i class="large green checkmark icon"></i>
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Project 3</td>
                                    <td class="right aligned">21</td>
                                    <td class="center aligned">
                                        <i class="large green checkmark icon"></i>
                                    </td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>


                    <h2 class="ui dividing header">States<a class="anchor" id="states"></a></h2>

                    <div class="example">
                        <h4 class="ui header" id="positive--negative"><a href="#positive--negative"><i
                                    class="fitted small linkify icon"></i>Positive / Negative</a></h4>
                        <i class="fitted icon code"></i>
                        <p>A cell or row may let a user know whether a value is good or bad</p>
                        <table class="ui celled table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Notes</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>No Name Specified</td>
                                    <td>Unknown</td>
                                    <td class="negative">None</td>
                                </tr>
                                <tr class="positive">
                                    <td>Jimmy</td>
                                    <td><i class="icon checkmark"></i> Approved</td>
                                    <td>None</td>
                                </tr>
                                <tr>
                                    <td>Jamie</td>
                                    <td>Unknown</td>
                                    <td class="positive"><i class="icon close"></i> Requires call</td>
                                </tr>
                                <tr class="negative">
                                    <td>Jill</td>
                                    <td>Unknown</td>
                                    <td>None</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <h3 class="ui header">Cells</h3>
                    <div class="example">
                        <h4 class="ui header" id="error"><a href="#error"><i
                                    class="fitted small linkify icon"></i>Error</a></h4>
                        <i class="fitted icon code"></i>
                        <p>A cell or row may call attention to an error or a negative value</p>
                        <table class="ui celled table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Notes</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>No Name Specified</td>
                                    <td>Approved</td>
                                    <td>None</td>
                                </tr>
                                <tr class="error">
                                    <td>Jimmy</td>
                                    <td>Cannot pull data</td>
                                    <td>None</td>
                                </tr>
                                <tr>
                                    <td>Jamie</td>
                                    <td>Approved</td>
                                    <td class="error"><i class="attention icon"></i> Classified</td>
                                </tr>
                                <tr>
                                    <td>Jill</td>
                                    <td>Approved</td>
                                    <td>None</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="example">
                        <h4 class="ui header" id="warning"><a href="#warning"><i
                                    class="fitted small linkify icon"></i>Warning</a></h4>
                        <i class="fitted icon code"></i>
                        <p>A cell or row may warn a user</p>
                        <table class="ui celled table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Notes</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>No Name Specified</td>
                                    <td>Unknown</td>
                                    <td>None</td>
                                </tr>
                                <tr class="warning">
                                    <td>Jimmy</td>
                                    <td><i class="attention icon"></i> Requires Action</td>
                                    <td>None</td>
                                </tr>
                                <tr>
                                    <td>Jamie</td>
                                    <td>Unknown</td>
                                    <td class="warning"><i class="attention icon"></i> Hostile</td>
                                </tr>
                                <tr>
                                    <td>Jill</td>
                                    <td>Unknown</td>
                                    <td>None</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="example">
                        <h4 class="ui header" id="active"><a href="#active"><i
                                    class="fitted small linkify icon"></i>Active</a></h4>
                        <i class="fitted icon code"></i>
                        <p>A cell or row can be active or selected by a user</p>
                        <table class="ui celled table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Notes</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Jamie</td>
                                    <td>Approved</td>
                                    <td>Requires call</td>
                                </tr>
                                <tr class="active">
                                    <td>John</td>
                                    <td>Selected</td>
                                    <td>None</td>
                                </tr>
                                <tr>
                                    <td>Jamie</td>
                                    <td>Approved</td>
                                    <td>Requires call</td>
                                </tr>
                                <tr>
                                    <td class="active">Jill</td>
                                    <td>Approved</td>
                                    <td>None</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="example">
                        <h4 class="ui header" id="disabled"><a href="#disabled"><i
                                    class="fitted small linkify icon"></i>Disabled</a></h4>
                        <i class="fitted icon code"></i>
                        <p>A cell can be disabled</p>
                        <table class="ui celled table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Notes</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="disabled">
                                    <td>Jamie</td>
                                    <td>Approved</td>
                                    <td>Requires call</td>
                                </tr>
                                <tr>
                                    <td>John</td>
                                    <td>Selected</td>
                                    <td>None</td>
                                </tr>
                                <tr>
                                    <td>Jamie</td>
                                    <td>Approved</td>
                                    <td>Requires call</td>
                                </tr>
                                <tr>
                                    <td class="disabled">Jill</td>
                                    <td>Approved</td>
                                    <td>None</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="example">
                        <h4 class="ui header" id="colored-cells"><a href="#colored-cells"><i
                                    class="fitted small linkify icon"></i>Colored Cells<div class="ui black label">New
                                    in 2.7</div></a></h4>
                        <i class="fitted icon code"></i>
                        <p>A cell can be styled by the central color palette colors</p>
                        <table class="ui celled table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Notes</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="orange">No Name Specified</td>
                                    <td>Unknown</td>
                                    <td>None</td>
                                </tr>
                                <tr class="blue">
                                    <td>Jimmy</td>
                                    <td><i class="microphone icon"></i> Recording session</td>
                                    <td>None</td>
                                </tr>
                                <tr>
                                    <td>Jamie</td>
                                    <td>Unknown</td>
                                    <td class="pink"><i class="child icon"></i> Baby Party</td>
                                </tr>
                                <tr>
                                    <td>Jill</td>
                                    <td>Unknown</td>
                                    <td class="green">Vacation</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="example">
                        <h4 class="ui header" id="marked"><a href="#marked"><i
                                    class="fitted small linkify icon"></i>Marked<div class="ui black label">New in 2.8
                                </div></a></h4>
                        <i class="fitted icon code"></i>
                        <p>A cell or row can be marked by a colored left or right border</p>
                        <table class="ui celled table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Notes</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="right marked blue">No Name Specified</td>
                                    <td class="left marked red">Unknown</td>
                                    <td>None</td>
                                </tr>
                                <tr class="left marked green">
                                    <td>Jimmy</td>
                                    <td><i class="microphone icon"></i> Recording session</td>
                                    <td>None</td>
                                </tr>
                                <tr>
                                    <td>Jamie</td>
                                    <td class="right marked orange">Unknown</td>
                                    <td><i class="child icon"></i> Baby Party</td>
                                </tr>
                                <tr class="right marked purple">
                                    <td>Jill</td>
                                    <td>Unknown</td>
                                    <td>Vacation</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <h2 class="ui dividing header">Variations<a class="anchor" id="variations"></a></h2>

                    <div class="example">
                        <h4 class="ui header" id="single-line"><a href="#single-line"><i
                                    class="fitted small linkify icon"></i>Single Line</a></h4>
                        <i class="fitted icon code"></i>
                        <p>A table can specify that its cell contents should remain on a single line, and not wrap.</p>
                        <table class="ui single line table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Registration Date</th>
                                    <th>E-mail address</th>
                                    <th>Premium Plan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>John Lilki</td>
                                    <td>September 14, 2013</td>
                                    <td>jhlilk22@yahoo.com</td>
                                    <td>No</td>
                                </tr>
                                <tr>
                                    <td>Jamie Harington</td>
                                    <td>January 11, 2014</td>
                                    <td>jamieharingonton@yahoo.com</td>
                                    <td>Yes</td>
                                </tr>
                                <tr>
                                    <td>Jill Lewis</td>
                                    <td>May 11, 2014</td>
                                    <td>jilsewris22@yahoo.com</td>
                                    <td>Yes</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="example">
                        <h4 class="ui header" id="fixed"><a href="#fixed"><i class="fitted small linkify icon"></i>
                                Fixed
                            </a></h4>
                        <i class="fitted icon code"></i>
                        <p>A table can use <a
                                href="https://developer.mozilla.org/en-US/docs/Web/CSS/table-layout"><code>table-layout: fixed</code></a>
                            a special faster form of table rendering that does not resize table cells based on content.
                        </p>
                        <table class="ui fixed table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>John</td>
                                    <td>Approved</td>
                                    <td>John is an interesting boy but sometimes you don't really have enough room to
                                        describe everything you'd like</td>
                                </tr>
                                <tr>
                                    <td>Jamie</td>
                                    <td>Approved</td>
                                    <td>Jamie is a kind girl but sometimes you don't really have enough room to describe
                                        everything you'd like</td>
                                </tr>
                                <tr>
                                    <td>Jill</td>
                                    <td>Denied</td>
                                    <td>Jill is an alright girl but sometimes you don't really have enough room to
                                        describe everything you'd like</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="another example">
                        <i class="fitted icon code"></i>
                        <div class="ui ignored info message">
                            Fixed <code>single line</code> tables will automatically ensure content that does not fit in
                            a single line will receive "..." ellipsis
                        </div>
                        <table class="ui fixed single line celled table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>John</td>
                                    <td>Approved</td>
                                    <td title="This is much too long to fit I'm sorry about that">This is much too long
                                        to fit I'm sorry about that</td>
                                </tr>
                                <tr>
                                    <td>Jamie</td>
                                    <td>Approved</td>
                                    <td>Shorter description</td>
                                </tr>
                                <tr>
                                    <td>Jill</td>
                                    <td>Denied</td>
                                    <td>Shorter description</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="example">
                        <h4 class="ui header" id="stacking"><a href="#stacking"><i
                                    class="fitted small linkify icon"></i>Stacking</a></h4>
                        <i class="fitted icon code"></i>
                        <p>A table can specify how it stacks table content responsively</p>

                        <table class="ui unstackable table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th class="right aligned">Notes</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>John</td>
                                    <td>Approved</td>
                                    <td class="right aligned">None</td>
                                </tr>
                                <tr>
                                    <td>Jamie</td>
                                    <td>Approved</td>
                                    <td class="right aligned">Requires call</td>
                                </tr>
                                <tr>
                                    <td>Jill</td>
                                    <td>Denied</td>
                                    <td class="right aligned">None</td>
                                </tr>
                            </tbody>
                        </table>

                        <table class="ui tablet stackable table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th class="right aligned">Notes</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>John</td>
                                    <td>Approved</td>
                                    <td class="right aligned">None</td>
                                </tr>
                                <tr>
                                    <td>Jamie</td>
                                    <td>Approved</td>
                                    <td class="right aligned">Requires call</td>
                                </tr>
                                <tr>
                                    <td>Jill</td>
                                    <td>Denied</td>
                                    <td class="right aligned">None</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="example">
                        <h4 class="ui header" id="selectable-row"><a href="#selectable-row"><i
                                    class="fitted small linkify icon"></i>Selectable Row</a></h4>
                        <i class="fitted icon code"></i>
                        <p>A table can have its rows appear selectable</p>
                        <table class="ui selectable celled table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Notes</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>John</td>
                                    <td>No Action</td>
                                    <td>None</td>
                                </tr>
                                <tr>
                                    <td>Jamie</td>
                                    <td>Approved</td>
                                    <td>Requires call</td>
                                </tr>
                                <tr>
                                    <td>Jill</td>
                                    <td>Denied</td>
                                    <td>None</td>
                                </tr>
                                <tr class="warning">
                                    <td>John</td>
                                    <td>No Action</td>
                                    <td>None</td>
                                </tr>
                                <tr>
                                    <td>Jamie</td>
                                    <td class="positive">Approved</td>
                                    <td class="warning">Requires call</td>
                                </tr>
                                <tr>
                                    <td>Jill</td>
                                    <td class="negative">Denied</td>
                                    <td>None</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="another example">
                        <i class="fitted icon code"></i>
                        <table class="ui selectable inverted table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th class="right aligned">Notes</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>John</td>
                                    <td>Approved</td>
                                    <td class="right aligned">None</td>
                                </tr>
                                <tr>
                                    <td>Jamie</td>
                                    <td>Approved</td>
                                    <td class="right aligned">Requires call</td>
                                </tr>
                                <tr>
                                    <td>Jill</td>
                                    <td>Denied</td>
                                    <td class="right aligned">None</td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                    <div class="example">
                        <h4 class="ui header" id="selectable-cell"><a href="#selectable-cell"><i
                                    class="fitted small linkify icon"></i>Selectable Cell</a></h4>
                        <i class="fitted icon code"></i>
                        <p>A table cell can be selectable</p>
                        <div class="ui ignored info message">Using an <code>a</code> link inside a selectable cell will
                            automatically make the hit box the entire cell area. By default links will inherit their
                            cell color.</div>
                        <table class="ui celled table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Edit</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>John</td>
                                    <td>No Action</td>
                                    <td class="selectable">
                                        <a href="#">Edit</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Jamie</td>
                                    <td>Approved</td>
                                    <td class="selectable">
                                        <a href="#">Edit</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Jill</td>
                                    <td>Denied</td>
                                    <td class="selectable">
                                        <a href="#">Edit</a>
                                    </td>
                                </tr>
                                <tr class="warning">
                                    <td>John</td>
                                    <td>No Action</td>
                                    <td class="selectable warning">
                                        <a href="#">Requires change</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Jamie</td>
                                    <td class="positive">Approved</td>
                                    <td class="selectable positive">
                                        <a href="#">Approve</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Jill</td>
                                    <td class="negative">Denied</td>
                                    <td class="selectable negative">
                                        <a href="#">Remove</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="example">
                        <h4 class="ui header" id="vertical-alignment"><a href="#vertical-alignment"><i
                                    class="fitted small linkify icon"></i>Vertical Alignment</a></h4>
                        <i class="fitted icon code"></i>
                        <p>A table header, row, or cell can adjust its vertical alignment</p>
                        <table class="ui striped table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Notes</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="top aligned">
                                    <td>John</td>
                                    <td>Approved</td>
                                    <td class="top aligned">
                                        Notes<br>
                                        1<br>
                                        2<br>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Jamie</td>
                                    <td class="bottom aligned">Approved</td>
                                    <td>
                                        Notes<br>
                                        1<br>
                                        2<br>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="example">
                        <h4 class="ui header" id="text-alignment"><a href="#text-alignment"><i
                                    class="fitted small linkify icon"></i>Text Alignment</a></h4>
                        <i class="fitted icon code"></i>
                        <p>A table header, row, or cell can adjust its text alignment</p>
                        <table class="ui striped table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th class="right aligned">Notes</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="center aligned">
                                    <td>John</td>
                                    <td>Approved</td>
                                    <td class="right aligned">None</td>
                                </tr>
                                <tr>
                                    <td>Jamie</td>
                                    <td>Approved</td>
                                    <td class="right aligned">Requires call</td>
                                </tr>
                                <tr>
                                    <td>Jill</td>
                                    <td>Denied</td>
                                    <td class="right aligned">None</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="example">
                        <h4 class="ui header" id="striped"><a href="#striped"><i
                                    class="fitted small linkify icon"></i>Striped</a></h4>
                        <i class="fitted icon code"></i>
                        <p>A table can stripe alternate rows of content with a darker color to increase contrast</p>
                        <table class="ui striped table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Date Joined</th>
                                    <th>E-mail</th>
                                    <th>Called</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>John Lilki</td>
                                    <td>September 14, 2013</td>
                                    <td>jhlilk22@yahoo.com</td>
                                    <td>No</td>
                                </tr>
                                <tr>
                                    <td>Jamie Harington</td>
                                    <td>January 11, 2014</td>
                                    <td>jamieharingonton@yahoo.com</td>
                                    <td>Yes</td>
                                </tr>
                                <tr>
                                    <td>Jill Lewis</td>
                                    <td>May 11, 2014</td>
                                    <td>jilsewris22@yahoo.com</td>
                                    <td>Yes</td>
                                </tr>
                                <tr>
                                    <td>John Lilki</td>
                                    <td>September 14, 2013</td>
                                    <td>jhlilk22@yahoo.com</td>
                                    <td>No</td>
                                </tr>
                                <tr>
                                    <td>John Lilki</td>
                                    <td>September 14, 2013</td>
                                    <td>jhlilk22@yahoo.com</td>
                                    <td>No</td>
                                </tr>
                                <tr>
                                    <td>Jamie Harington</td>
                                    <td>January 11, 2014</td>
                                    <td>jamieharingonton@yahoo.com</td>
                                    <td>Yes</td>
                                </tr>
                                <tr>
                                    <td>Jill Lewis</td>
                                    <td>May 11, 2014</td>
                                    <td>jilsewris22@yahoo.com</td>
                                    <td>Yes</td>
                                </tr>
                                <tr>
                                    <td>John Lilki</td>
                                    <td>September 14, 2013</td>
                                    <td>jhlilk22@yahoo.com</td>
                                    <td>No</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="example">
                        <h4 class="ui header" id="celled"><a href="#celled"><i
                                    class="fitted small linkify icon"></i>Celled</a></h4>
                        <i class="fitted icon code"></i>
                        <p>A table may be divided each row into separate cells</p>
                        <table class="ui celled table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Notes</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>John</td>
                                    <td>Approved</td>
                                    <td>None</td>
                                </tr>
                                <tr>
                                    <td>Jamie</td>
                                    <td>Approved</td>
                                    <td>Requires call</td>
                                </tr>
                                <tr>
                                    <td>Jill</td>
                                    <td>Denied</td>
                                    <td>None</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>3 People</th>
                                    <th>2 Approved</th>
                                    <th></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                    <div class="example">
                        <h4 class="ui header" id="basic"><a href="#basic"><i
                                    class="fitted small linkify icon"></i>Basic</a></h4>
                        <i class="fitted icon code"></i>
                        <p>A table can reduce its complexity to increase readability.</p>
                        <table class="ui basic table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Notes</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>John</td>
                                    <td>Approved</td>
                                    <td>None</td>
                                </tr>
                                <tr>
                                    <td>Jamie</td>
                                    <td>Approved</td>
                                    <td>Requires call</td>
                                </tr>
                                <tr>
                                    <td>Jill</td>
                                    <td>Denied</td>
                                    <td>None</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="another example">
                        <i class="fitted icon code"></i>
                        <table class="ui very basic table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Notes</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>John</td>
                                    <td>Approved</td>
                                    <td>None</td>
                                </tr>
                                <tr>
                                    <td>Jamie</td>
                                    <td>Approved</td>
                                    <td>Requires call</td>
                                </tr>
                                <tr>
                                    <td>Jill</td>
                                    <td>Denied</td>
                                    <td>None</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="example">
                        <h4 class="ui header" id="collapsing-cell"><a href="#collapsing-cell"><i
                                    class="fitted small linkify icon"></i>Collapsing Cell</a></h4>
                        <i class="fitted icon code"></i>
                        <p>A cell can be collapsing so that it only uses as much space as required</p>
                        <div class="ui ignored warning icon message">
                            <i class="warning icon"></i>
                            <div class="content">
                                To ensure icons don't wrap to a separate line you must either specify collapsing on the
                                widest row in the collapsing column, or on all rows
                            </div>
                        </div>

                        <table class="ui table">
                            <tbody>
                                <tr>
                                    <td class="collapsing">
                                        <i class="folder icon"></i> node_modules
                                    </td>
                                    <td>Initial commit</td>
                                    <td>10 hours ago</td>
                                </tr>
                                <tr>
                                    <td>
                                        <i class="folder icon"></i> test
                                    </td>
                                    <td>Initial commit</td>
                                    <td>10 hours ago</td>
                                </tr>
                                <tr>
                                    <td>
                                        <i class="folder icon"></i> build
                                    </td>
                                    <td>Initial commit</td>
                                    <td>10 hours ago</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="example">
                        <h4 class="ui header" id="column-count"><a href="#column-count"><i
                                    class="fitted small linkify icon"></i>Column Count</a></h4>
                        <i class="fitted icon code"></i>
                        <p>A table can specify its column count to divide its content evenly</p>
                        <table class="ui five column table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Age</th>
                                    <th>Gender</th>
                                    <th>Notes</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>John</td>
                                    <td>Approved</td>
                                    <td>22</td>
                                    <td>Male</td>
                                    <td>None</td>
                                </tr>
                                <tr>
                                    <td>Jamie</td>
                                    <td>Approved</td>
                                    <td>32</td>
                                    <td>Male</td>
                                    <td>Requires call</td>
                                </tr>
                                <tr>
                                    <td>Jill</td>
                                    <td>Denied</td>
                                    <td>22</td>
                                    <td>Female</td>
                                    <td>None</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>3 People</th>
                                    <th>2 Approved</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                    <div class="example">
                        <h4 class="ui header" id="column-width"><a href="#column-width"><i
                                    class="fitted small linkify icon"></i>Column Width</a></h4>
                        <i class="fitted icon code"></i>
                        <p>A table can specify the width of individual columns independently.</p>
                        <div class="ui ignored info message">Tables use a 16 column grid similar to <a
                                href="/collections/grid.html">ui grid</a></div>
                        <table class="ui table">
                            <thead>
                                <tr>
                                    <th class="ten wide">Name</th>
                                    <th class="six wide">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>John</td>
                                    <td>Approved</td>
                                </tr>
                                <tr>
                                    <td>Jamie</td>
                                    <td>Approved</td>
                                </tr>
                                <tr>
                                    <td>Jill</td>
                                    <td>Denied</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>3 People</th>
                                    <th>2 Approved</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                    <div class="example">
                        <h4 class="ui header" id="collapsing"><a href="#collapsing"><i
                                    class="fitted small linkify icon"></i>Collapsing</a></h4>
                        <i class="fitted icon code"></i>
                        <p>A table can be collapsing, taking up only as much space as its rows.</p>
                        <table class="ui collapsing table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Notes</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>John</td>
                                    <td>Approved</td>
                                    <td>None</td>
                                </tr>
                                <tr>
                                    <td>Jamie</td>
                                    <td>Approved</td>
                                    <td>Requires call</td>
                                </tr>
                                <tr>
                                    <td>Jill</td>
                                    <td>Denied</td>
                                    <td>None</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>3 People</th>
                                    <th>2 Approved</th>
                                    <th></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                    <div class="example">
                        <h4 class="ui header" id="colored"><a href="#colored"><i
                                    class="fitted small linkify icon"></i>Colored</a></h4>
                        <i class="fitted icon code"></i>
                        <p>A table can be given a color to distinguish it from other tables.</p>
                        <table class="ui red table">
                            <thead>
                                <tr>
                                    <th>Food</th>
                                    <th>Calories</th>
                                    <th>Protein</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Apples</td>
                                    <td>200</td>
                                    <td>0g</td>
                                </tr>
                                <tr>
                                    <td>Orange</td>
                                    <td>310</td>
                                    <td>0g</td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="ui orange table">
                            <thead>
                                <tr>
                                    <th>Food</th>
                                    <th>Calories</th>
                                    <th>Protein</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Apples</td>
                                    <td>200</td>
                                    <td>0g</td>
                                </tr>
                                <tr>
                                    <td>Orange</td>
                                    <td>310</td>
                                    <td>0g</td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="ui yellow table">
                            <thead>
                                <tr>
                                    <th>Food</th>
                                    <th>Calories</th>
                                    <th>Protein</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Apples</td>
                                    <td>200</td>
                                    <td>0g</td>
                                </tr>
                                <tr>
                                    <td>Orange</td>
                                    <td>310</td>
                                    <td>0g</td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="ui olive table">
                            <thead>
                                <tr>
                                    <th>Food</th>
                                    <th>Calories</th>
                                    <th>Protein</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Apples</td>
                                    <td>200</td>
                                    <td>0g</td>
                                </tr>
                                <tr>
                                    <td>Orange</td>
                                    <td>310</td>
                                    <td>0g</td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="ui green table">
                            <thead>
                                <tr>
                                    <th>Food</th>
                                    <th>Calories</th>
                                    <th>Protein</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Apples</td>
                                    <td>200</td>
                                    <td>0g</td>
                                </tr>
                                <tr>
                                    <td>Orange</td>
                                    <td>310</td>
                                    <td>0g</td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="ui teal table">
                            <thead>
                                <tr>
                                    <th>Food</th>
                                    <th>Calories</th>
                                    <th>Protein</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Apples</td>
                                    <td>200</td>
                                    <td>0g</td>
                                </tr>
                                <tr>
                                    <td>Orange</td>
                                    <td>310</td>
                                    <td>0g</td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="ui blue table">
                            <thead>
                                <tr>
                                    <th>Food</th>
                                    <th>Calories</th>
                                    <th>Protein</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Apples</td>
                                    <td>200</td>
                                    <td>0g</td>
                                </tr>
                                <tr>
                                    <td>Orange</td>
                                    <td>310</td>
                                    <td>0g</td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="ui violet table">
                            <thead>
                                <tr>
                                    <th>Food</th>
                                    <th>Calories</th>
                                    <th>Protein</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Apples</td>
                                    <td>200</td>
                                    <td>0g</td>
                                </tr>
                                <tr>
                                    <td>Orange</td>
                                    <td>310</td>
                                    <td>0g</td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="ui purple table">
                            <thead>
                                <tr>
                                    <th>Food</th>
                                    <th>Calories</th>
                                    <th>Protein</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Apples</td>
                                    <td>200</td>
                                    <td>0g</td>
                                </tr>
                                <tr>
                                    <td>Orange</td>
                                    <td>310</td>
                                    <td>0g</td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="ui pink table">
                            <thead>
                                <tr>
                                    <th>Food</th>
                                    <th>Calories</th>
                                    <th>Protein</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Apples</td>
                                    <td>200</td>
                                    <td>0g</td>
                                </tr>
                                <tr>
                                    <td>Orange</td>
                                    <td>310</td>
                                    <td>0g</td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="ui grey table">
                            <thead>
                                <tr>
                                    <th>Food</th>
                                    <th>Calories</th>
                                    <th>Protein</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Apples</td>
                                    <td>200</td>
                                    <td>0g</td>
                                </tr>
                                <tr>
                                    <td>Orange</td>
                                    <td>310</td>
                                    <td>0g</td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="ui black table">
                            <thead>
                                <tr>
                                    <th>Food</th>
                                    <th>Calories</th>
                                    <th>Protein</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Apples</td>
                                    <td>200</td>
                                    <td>0g</td>
                                </tr>
                                <tr>
                                    <td>Orange</td>
                                    <td>310</td>
                                    <td>0g</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="example">
                        <h4 class="ui header" id="inverted"><a href="#inverted"><i
                                    class="fitted small linkify icon"></i>Inverted</a></h4>
                        <i class="fitted icon code"></i>
                        <p>A table's colors can be inverted</p>
                        <table class="ui inverted table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Notes</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>John</td>
                                    <td>Approved</td>
                                    <td>None</td>
                                </tr>
                                <tr>
                                    <td>Jamie</td>
                                    <td>Approved</td>
                                    <td>Requires call</td>
                                </tr>
                                <tr>
                                    <td>Jill</td>
                                    <td>Denied</td>
                                    <td>None</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>3 People</th>
                                    <th>2 Approved</th>
                                    <th></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="another example">
                        <i class="fitted icon code"></i>
                        <table class="ui inverted red table">
                            <thead>
                                <tr>
                                    <th>Food</th>
                                    <th>Calories</th>
                                    <th>Protein</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Apples</td>
                                    <td>200</td>
                                    <td>0g</td>
                                </tr>
                                <tr>
                                    <td>Orange</td>
                                    <td>310</td>
                                    <td>0g</td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="ui inverted orange table">
                            <thead>
                                <tr>
                                    <th>Food</th>
                                    <th>Calories</th>
                                    <th>Protein</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Apples</td>
                                    <td>200</td>
                                    <td>0g</td>
                                </tr>
                                <tr>
                                    <td>Orange</td>
                                    <td>310</td>
                                    <td>0g</td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="ui inverted yellow table">
                            <thead>
                                <tr>
                                    <th>Food</th>
                                    <th>Calories</th>
                                    <th>Protein</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Apples</td>
                                    <td>200</td>
                                    <td>0g</td>
                                </tr>
                                <tr>
                                    <td>Orange</td>
                                    <td>310</td>
                                    <td>0g</td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="ui inverted olive table">
                            <thead>
                                <tr>
                                    <th>Food</th>
                                    <th>Calories</th>
                                    <th>Protein</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Apples</td>
                                    <td>200</td>
                                    <td>0g</td>
                                </tr>
                                <tr>
                                    <td>Orange</td>
                                    <td>310</td>
                                    <td>0g</td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="ui inverted green table">
                            <thead>
                                <tr>
                                    <th>Food</th>
                                    <th>Calories</th>
                                    <th>Protein</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Apples</td>
                                    <td>200</td>
                                    <td>0g</td>
                                </tr>
                                <tr>
                                    <td>Orange</td>
                                    <td>310</td>
                                    <td>0g</td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="ui inverted teal table">
                            <thead>
                                <tr>
                                    <th>Food</th>
                                    <th>Calories</th>
                                    <th>Protein</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Apples</td>
                                    <td>200</td>
                                    <td>0g</td>
                                </tr>
                                <tr>
                                    <td>Orange</td>
                                    <td>310</td>
                                    <td>0g</td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="ui inverted blue table">
                            <thead>
                                <tr>
                                    <th>Food</th>
                                    <th>Calories</th>
                                    <th>Protein</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Apples</td>
                                    <td>200</td>
                                    <td>0g</td>
                                </tr>
                                <tr>
                                    <td>Orange</td>
                                    <td>310</td>
                                    <td>0g</td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="ui inverted violet table">
                            <thead>
                                <tr>
                                    <th>Food</th>
                                    <th>Calories</th>
                                    <th>Protein</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Apples</td>
                                    <td>200</td>
                                    <td>0g</td>
                                </tr>
                                <tr>
                                    <td>Orange</td>
                                    <td>310</td>
                                    <td>0g</td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="ui inverted purple table">
                            <thead>
                                <tr>
                                    <th>Food</th>
                                    <th>Calories</th>
                                    <th>Protein</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Apples</td>
                                    <td>200</td>
                                    <td>0g</td>
                                </tr>
                                <tr>
                                    <td>Orange</td>
                                    <td>310</td>
                                    <td>0g</td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="ui inverted pink table">
                            <thead>
                                <tr>
                                    <th>Food</th>
                                    <th>Calories</th>
                                    <th>Protein</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Apples</td>
                                    <td>200</td>
                                    <td>0g</td>
                                </tr>
                                <tr>
                                    <td>Orange</td>
                                    <td>310</td>
                                    <td>0g</td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="ui inverted brown table">
                            <thead>
                                <tr>
                                    <th>Food</th>
                                    <th>Calories</th>
                                    <th>Protein</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Apples</td>
                                    <td>200</td>
                                    <td>0g</td>
                                </tr>
                                <tr>
                                    <td>Orange</td>
                                    <td>310</td>
                                    <td>0g</td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="ui inverted grey table">
                            <thead>
                                <tr>
                                    <th>Food</th>
                                    <th>Calories</th>
                                    <th>Protein</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Apples</td>
                                    <td>200</td>
                                    <td>0g</td>
                                </tr>
                                <tr>
                                    <td>Orange</td>
                                    <td>310</td>
                                    <td>0g</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="example">
                        <h4 class="ui header" id="sortable"><a href="#sortable"><i
                                    class="fitted small linkify icon"></i>Sortable</a></h4>
                        <i class="fitted icon code"></i>
                        <p>A table may allow a user to sort contents by clicking on a table header.</p>

                        <div class="ui ignored warning message">Adding the class <code>ascending</code> or
                            <code>descending</code> to the <code>th</code> will show the user the sorting direction.
                            This example uses a modified version of the kylefox's <a
                                href="https://github.com/kylefox/jquery-tablesort">tablesort plugin</a> to provide the
                            proper class names. To make sortable tables work, include <a
                                href="http://semantic-ui.com/javascript/library/tablesort.js">this javascript</a> into
                            your page and call <code>$('table').tablesort()</code> when the DOM is ready.
                        </div>

                        <table class="ui sortable celled table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Notes</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>John</td>
                                    <td>No Action</td>
                                    <td>None</td>
                                </tr>
                                <tr>
                                    <td>Jamie</td>
                                    <td class="positive">Approved</td>
                                    <td class="warning">Requires call</td>
                                </tr>
                                <tr>
                                    <td>Jill</td>
                                    <td class="negative">Denied</td>
                                    <td>None</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>3 People</th>
                                    <th>2 Approved</th>
                                    <th></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="example">
                        <h4 class="ui header" id="full-width-header--footer"><a href="#full-width-header--footer"><i
                                    class="fitted small linkify icon"></i>Full-Width Header / Footer </a></h4>
                        <i class="fitted icon code"></i>
                        <p>A definition table can have a full width header or footer, filling in the gap left by the
                            first column</p>
                        <table class="ui compact celled definition table">
                            <thead class="full-width">
                                <tr>
                                    <th></th>
                                    <th>Name</th>
                                    <th>Registration Date</th>
                                    <th>E-mail address</th>
                                    <th>Premium Plan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="collapsing">
                                        <div class="ui fitted slider checkbox">
                                            <input type="checkbox" tabindex="0" class="hidden"> <label></label>
                                        </div>
                                    </td>
                                    <td>John Lilki</td>
                                    <td>September 14, 2013</td>
                                    <td>jhlilk22@yahoo.com</td>
                                    <td>No</td>
                                </tr>
                                <tr>
                                    <td class="collapsing">
                                        <div class="ui fitted slider checkbox">
                                            <input type="checkbox" tabindex="0" class="hidden"> <label></label>
                                        </div>
                                    </td>
                                    <td>Jamie Harington</td>
                                    <td>January 11, 2014</td>
                                    <td>jamieharingonton@yahoo.com</td>
                                    <td>Yes</td>
                                </tr>
                                <tr>
                                    <td class="collapsing">
                                        <div class="ui fitted slider checkbox">
                                            <input type="checkbox" tabindex="0" class="hidden"> <label></label>
                                        </div>
                                    </td>
                                    <td>Jill Lewis</td>
                                    <td>May 11, 2014</td>
                                    <td>jilsewris22@yahoo.com</td>
                                    <td>Yes</td>
                                </tr>
                            </tbody>
                            <tfoot class="full-width">
                                <tr>
                                    <th></th>
                                    <th colspan="4">
                                        <div class="ui right floated small primary labeled icon button">
                                            <i class="user icon"></i> Add User
                                        </div>
                                        <div class="ui small  button">
                                            Approve
                                        </div>
                                        <div class="ui small  disabled button">
                                            Approve All
                                        </div>
                                    </th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="example">
                        <h4 class="ui header" id="padded"><a href="#padded"><i
                                    class="fitted small linkify icon"></i>Padded</a></h4>
                        <i class="fitted icon code"></i>
                        <p>A table may sometimes need to be more padded for legibility</p>
                        <table class="ui padded table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Notes</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>John</td>
                                    <td>Approved</td>
                                    <td>He is a very nice guy and I enjoyed talking to him on the telephone. I hope we
                                        get to talk again.</td>
                                </tr>
                                <tr>
                                    <td>Jamie</td>
                                    <td>Approved</td>
                                    <td>Jamie was not interested in purchasing our product.</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="another example">
                        <i class="fitted icon code"></i>
                        <table class="ui very padded table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Notes</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>John</td>
                                    <td>Approved</td>
                                    <td>He is a very nice guy and I enjoyed talking to him on the telephone. I hope we
                                        get to talk again.</td>
                                </tr>
                                <tr>
                                    <td>Jamie</td>
                                    <td>Approved</td>
                                    <td>Jamie was not interested in purchasing our product.</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="example">
                        <h4 class="ui header" id="compact"><a href="#compact"><i
                                    class="fitted small linkify icon"></i>Compact</a></h4>
                        <i class="fitted icon code"></i>
                        <p>A table may sometimes need to be more compact to make more rows visible at a time</p>
                        <table class="ui compact table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Notes</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>John</td>
                                    <td>Approved</td>
                                    <td>None</td>
                                </tr>
                                <tr>
                                    <td>Jamie</td>
                                    <td>Approved</td>
                                    <td>Requires call</td>
                                </tr>
                                <tr>
                                    <td>John</td>
                                    <td>Approved</td>
                                    <td>None</td>
                                </tr>
                                <tr>
                                    <td>Jamie</td>
                                    <td>Approved</td>
                                    <td>Requires call</td>
                                </tr>
                                <tr>
                                    <td>John</td>
                                    <td>Approved</td>
                                    <td>None</td>
                                </tr>
                                <tr>
                                    <td>Jamie</td>
                                    <td>Approved</td>
                                    <td>Requires call</td>
                                </tr>
                                <tr>
                                    <td>John</td>
                                    <td>Approved</td>
                                    <td>None</td>
                                </tr>
                                <tr>
                                    <td>Jamie</td>
                                    <td>Approved</td>
                                    <td>Requires call</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="another example">
                        <i class="fitted icon code"></i>
                        <table class="ui very compact table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Another Status</th>
                                    <th>Notes</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>John</td>
                                    <td>Approved</td>
                                    <td>Approved</td>
                                    <td>None</td>
                                </tr>
                                <tr>
                                    <td>Jamie</td>
                                    <td>Approved</td>
                                    <td>Approved</td>
                                    <td>Requires call</td>
                                </tr>
                                <tr>
                                    <td>John</td>
                                    <td>Approved</td>
                                    <td>Approved</td>
                                    <td>None</td>
                                </tr>
                                <tr>
                                    <td>Jamie</td>
                                    <td>Approved</td>
                                    <td>Approved</td>
                                    <td>Requires call</td>
                                </tr>
                                <tr>
                                    <td>John</td>
                                    <td>Approved</td>
                                    <td>Approved</td>
                                    <td>None</td>
                                </tr>
                                <tr>
                                    <td>Jamie</td>
                                    <td>Approved</td>
                                    <td>Approved</td>
                                    <td>Requires call</td>
                                </tr>
                                <tr>
                                    <td>John</td>
                                    <td>Approved</td>
                                    <td>Approved</td>
                                    <td>None</td>
                                </tr>
                                <tr>
                                    <td>Jamie</td>
                                    <td>Approved</td>
                                    <td>Approved</td>
                                    <td>Requires call</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="example">
                        <h4 class="ui header" id="size"><a href="#size"><i
                                    class="fitted small linkify icon"></i>Size</a></h4>
                        <i class="fitted icon code"></i>
                        <p>A table can also be small or large</p>
                        <table class="ui small table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Notes</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>John</td>
                                    <td>Approved</td>
                                    <td>None</td>
                                </tr>
                                <tr>
                                    <td>Jamie</td>
                                    <td>Approved</td>
                                    <td>Requires call</td>
                                </tr>
                                <tr>
                                    <td>Jill</td>
                                    <td>Denied</td>
                                    <td>None</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>3 People</th>
                                    <th>2 Approved</th>
                                    <th></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="another example">
                        <i class="fitted icon code"></i>
                        <table class="ui large table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Notes</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>John</td>
                                    <td>Approved</td>
                                    <td>None</td>
                                </tr>
                                <tr>
                                    <td>Jamie</td>
                                    <td>Approved</td>
                                    <td>Requires call</td>
                                </tr>
                                <tr>
                                    <td>Jill</td>
                                    <td>Denied</td>
                                    <td>None</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>3 People</th>
                                    <th>2 Approved</th>
                                    <th></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>

    </div>
    <!-- El Contenido termina aqui -->
</div>
<!-- </div> -->
<!-- End pusher -->
<!-- END CONTENT -->

<?php include "include/footer.php"; ?>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
<script src="assets/js/p-contratos.js"></script>