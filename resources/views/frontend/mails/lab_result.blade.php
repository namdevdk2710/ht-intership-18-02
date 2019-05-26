<div>
    <h1 style="text-align:center">Xin chào {{$resultLab->information->name}}</h1>
    <h2 style="text-align:center">Kết quả xét nghiệm của bạn</h3>
</div>
<div>
    <h2 style="color: navy">Thông tin cá nhân</h2>
    <hr>
    <div style="width:80%; margin:0 auto">
        <label style="font-weight:bold; font-size:120%; padding-right: 3em;">
            Họ tên: <span style="color: red">{{$resultLab->information->name}}</span>
        </label>
        <label style="font-weight:bold; font-size:120%; padding-right: 3em;">
            Ngày sinh:<span style="color: red">{{$resultLab->information->dob}}</span>
        </label>&emsp;&emsp;
        <label style="font-weight:bold; font-size:120%; padding-right: 3em;">
            Giới tính:
            @if($resultLab->information->gender==1)
            <span style="color: red">{{"Nam"}}</span>
            @else
            <span style="color: red">{{"Nữ"}}</span>
            @endif
        </label>&emsp;&emsp;
        <label style="font-weight:bold; font-size:120%; padding-right: 3em;">
            CMND: <span style="color: red">{{$resultLab->information->cmnd}}</span>
        </label>
        <br>
        <br>
        <label style="font-weight:bold; font-size:120%">
            Địa chỉ:
            <span style="color: red">
                {{
                $resultLab->information->address."-".
                $resultLab->information->commune->name."-".
                $resultLab->information->commune->district->name."-".
                $resultLab->information->commune->district->city->name
            }}
            </span>
        </label>
        <br>
        <br>
        <label style="font-weight:bold; font-size:120%">
            Nhóm máu: <span style="color: red">{{$resultLab->information->bloodGroup->name}}</span>
        </label>&emsp;&emsp;
        <label style="font-weight:bold; font-size:120%">
            Ngày lấy máu:
            <span style="color: red">
                {{$resultLab->requestBlood->bloodBag->last()->created_at}}
            </span>
        </label>&emsp;&emsp;
        <label style="font-weight:bold; font-size:120%">
            Lượng máu lấy:
            <span style="color: red">
                {{ $resultLab->requestBlood->bloodBag->last()->unit."ml"}}
            </span>
        </label>&emsp;&emsp;
    </div>
    <h2 style="color: navy">Kết quả xét nghiệm</h2>
    <hr>
    <div style="display:inline; padding-left:5em">
        <H1 style="color: red; text-align: center">
            @if(($resultLab->requestBlood->bloodBag->last()->status) == 0 )
             <span style=" color: red">{{"KHÔNG ĐẠT"}}</span>
            @else
            <span style= "color: navy">{{"ĐẠT"}}</span>
            @endif
        </H1>
        <div style="width: 80%; margin: 0 auto">
            <label style="font-weight:bold; font-size:120%; padding-right: 3em;">
                Hbs Ag(ELISA):
                @if(($resultLab->requestBlood->bloodBag->last()->hbsag)==0)
                <span style= "color: navy">{{"Âm tính"}}</span>
                @else
                <span style=" color: red">{{"Dương tính"}}</span>
                @endif
            </label>
            &emsp;
            <label style="font-weight:bold; font-size:120%; padding-right: 3em;">
                Anti HIV(ELISA):
                @if(($resultLab->requestBlood->bloodBag->last()->antihiv)==0)
                <span style= "color: navy">{{"Âm tính"}}</span>
                @else
                <span style=" color: red">{{"Dương tính"}}</span>
                @endif
            </label>
            &emsp;
            <label style="font-weight:bold; font-size:120%;padding-right: 3em;">
                Anti HCV(ELISA):
                @if(($resultLab->requestBlood->bloodBag->last()->antihcv)==0)
                <span style= "color: navy">{{"Âm tính"}}</span>
                @else
                <span style=" color: red">{{"Dương tính"}}</span>
                @endif
            </label>
            &emsp;
            <br><br>
            <label style="font-weight:bold; font-size:120%; padding-right: 6em;">
                HBVNAT:
                @if(($resultLab->requestBlood->bloodBag->last()->hbvnat)==0)
                <span style= "color: navy">{{"Âm tính"}}</span>
                @else
                <span style=" color: red">{{"Dương tính"}}</span>
                @endif
            </label>
            &emsp;
            <label style="font-weight:bold; font-size:120%; padding-right: 7em;">
                HIVNAT:
                @if(($resultLab->requestBlood->bloodBag->last()->hivnat)==0)
                <span style= "color: navy">{{"Âm tính"}}</span>
                @else
                <span style=" color: red">{{"Dương tính"}}</span>
                @endif
            </label>
            &emsp;
            <label style="font-weight:bold; font-size:120%; padding-right: 3em;">
                HCVNAT:
                @if(($resultLab->requestBlood->bloodBag->last()->hcvnat)==0)
                <span style= "color: navy">{{"Âm tính"}}</span>
                @else
                <span style=" color: red">{{"Dương tính"}}</span>
                @endif
            </label>
            &emsp;
            <br><br>
            <label style="font-weight:bold; font-size:120%; padding-right: 5em;">
                Giang mai:
                @if(($resultLab->requestBlood->bloodBag->last()->syphilis)==0)
                <span style= "color: navy">{{"Âm tính"}}</span>
                @else
                <span style=" color: red">{{"Dương tính"}}</span>
                @endif
            </label>
            &emsp;
            <label style="font-weight:bold; font-size:120%; padding-right: 3em;">
                Sốt rét:
                @if(($resultLab->requestBlood->bloodBag->last()->malaria)==0)
                <span style= "color: navy">{{"Âm tính"}}</span>
                @else
                <span style=" color: red">{{"Dương tính"}}</span>
                @endif
            </label>
            &emsp;
            <br>
            <br>
            <label style="font-weight:bold; font-size:120%">
                Ghi chú:
                <span style="color: red">{{ $resultLab->requestBlood->bloodBag->last()->other}}</span>
            </label>
            &emsp;
        </div>
    </div>
</div>
