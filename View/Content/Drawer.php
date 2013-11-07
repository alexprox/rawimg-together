<div class="nav-button-fixed">
    <button class="btn btn-large btn-primary draw-editor-toggler"><i class="icon-pencil"></i></button>
    <button class="btn btn-large btn-danger cancel"><i class="icon-remove"></i></button>
    <button class="btn btn-large btn-success save-drawing" value="<?= $drawer; ?>"><i class="icon-download-alt"></i></button>
    <div class="draw-editor">
        <button class="btn btn-large size" value="1"><i class="icon-plus-sign"></i></button>
        <button class="btn btn-large size" value="-1"><i class="icon-minus-sign"></i></button>
        <div class="colors"></div>
        <button class="btn btn-large btn-warning clear"><i class="icon-trash"></i></button>
    </div>
</div>
<div class="wrapper">
    <canvas id="draw"></canvas>
</div>