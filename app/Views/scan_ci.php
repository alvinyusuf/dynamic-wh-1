<?= $this->extend('layout/index'); ?>
<?= $this->section('content'); ?>
<style>
    html,
    body {
        min-height: 100%;
        padding: 0;
        margin: 0;
        color: #666;
    }

    h1 {
        margin: 0 0 20px;
        font-weight: 400;
        color: #1c87c9;
        text-align: center;
    }

    p {
        margin: 0 0 5px;
    }

    .main-block {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
    }

    form {
        padding: 25px;
        margin: 25px;
        box-shadow: 0 2px 5px #f5f5f5;
        background: #f5f5f5;
    }


    input,
    textarea {
        width: calc(100% - 18px);
        padding: 8px;
        margin-bottom: 20px;
        border: 1px solid #1c87c9;
        outline: none;
    }

    input::placeholder {
        color: #666;
    }

    button {
        width: 100%;
        padding: 10px;
        border: none;
        background: #1c87c9;
        font-size: 16px;
        font-weight: 400;
        color: #fff;
    }

    @media (min-width: 568px) {
        .main-block {
            flex-direction: row;
        }

        .left-part,
        form {
            width: 50%;
        }
    }
</style>
<div class="main-block">
    <form action="#" method="post" enctype="multipart/form-data" id="form-scan">
        <h1>SCAN LTS</h1>
        <div class="info">
            <input type="text" name="tgl_ci" id="liveTime" disabled>
            <label class="form-label">SCAN</label>
            <input type="text" name="scan" placeholder="Masukkan scan LTS disini">
            <label class="form-label">Part Number</label>
            <input type="text" name="partno" disabled>
        </div>
        <button type="submit" href="#">Submit</button>
    </form>
</div>
<script>
    function updateLiveTime() {
        var currentTime = new Date();
        var formattedTime = currentTime.toISOString().slice(0, 19).replace("T", " ");
        $("#liveTime").val(formattedTime);
    }

    // Update live time every second
    setInterval(updateLiveTime, 1000);

    // Initial update
    updateLiveTime();
</script>
<?= $this->endSection(); ?>