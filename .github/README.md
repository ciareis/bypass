<div align="center">
	<p><img  src="../docs/img/logo.png" alt="Bypass Logo" width="200">
    <h1>Bypass for PHP</h1>
    </p>
</div>
      
<p align="center">
  <a href="#about">About</a> |
  <a href="#installation">Installation</a> |
  <a href="#writing-tests">Writing Tests</a> |
  <a href="#examples">Examples</a> |
  <a href="#credits">Credits</a> |
  <a href="#inspired">Inspired</a>
</p>

<p align="center">
  <!-- base64 flags are available at https://www.phoca.cz/cssflags/ -->
   <!-- en-US -->
   <a href="https://github.com/ciareis/bypass/blob/master/.github/README.md">
    <img height="20px" src="https://img.shields.io/badge/English (US)-flag.svg?color=555555&style=flat&logo=data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAxMjM1IDY1MCIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiPg0KPGRlZnM+DQo8ZyBpZD0idW5pb24iPg0KPHVzZSB5PSItLjIxNiIgeGxpbms6aHJlZj0iI3g0Ii8+DQo8dXNlIHhsaW5rOmhyZWY9IiN4NCIvPg0KPHVzZSB5PSIuMjE2IiB4bGluazpocmVmPSIjczYiLz4NCjwvZz4NCjxnIGlkPSJ4NCI+DQo8dXNlIHhsaW5rOmhyZWY9IiNzNiIvPg0KPHVzZSB5PSIuMDU0IiB4bGluazpocmVmPSIjczUiLz4NCjx1c2UgeT0iLjEwOCIgeGxpbms6aHJlZj0iI3M2Ii8+DQo8dXNlIHk9Ii4xNjIiIHhsaW5rOmhyZWY9IiNzNSIvPg0KPC9nPg0KPGcgaWQ9InM1Ij4NCjx1c2UgeD0iLS4yNTIiIHhsaW5rOmhyZWY9IiNzdGFyIi8+DQo8dXNlIHg9Ii0uMTI2IiB4bGluazpocmVmPSIjc3RhciIvPg0KPHVzZSB4bGluazpocmVmPSIjc3RhciIvPg0KPHVzZSB4PSIuMTI2IiB4bGluazpocmVmPSIjc3RhciIvPg0KPHVzZSB4PSIuMjUyIiB4bGluazpocmVmPSIjc3RhciIvPg0KPC9nPg0KPGcgaWQ9InM2Ij4NCjx1c2UgeD0iLS4wNjMiIHhsaW5rOmhyZWY9IiNzNSIvPg0KPHVzZSB4PSIuMzE1IiB4bGluazpocmVmPSIjc3RhciIvPg0KPC9nPg0KPGcgaWQ9InN0YXIiPg0KPHVzZSB4bGluazpocmVmPSIjcHQiIHRyYW5zZm9ybT0ibWF0cml4KC0uODA5MDIgLS41ODc3OSAuNTg3NzkgLS44MDkwMiAwIDApIi8+DQo8dXNlIHhsaW5rOmhyZWY9IiNwdCIgdHJhbnNmb3JtPSJtYXRyaXgoLjMwOTAyIC0uOTUxMDYgLjk1MTA2IC4zMDkwMiAwIDApIi8+DQo8dXNlIHhsaW5rOmhyZWY9IiNwdCIvPg0KPHVzZSB4bGluazpocmVmPSIjcHQiIHRyYW5zZm9ybT0icm90YXRlKDcyKSIvPg0KPHVzZSB4bGluazpocmVmPSIjcHQiIHRyYW5zZm9ybT0icm90YXRlKDE0NCkiLz4NCjwvZz4NCjxwYXRoIGZpbGw9IiNmZmYiIGlkPSJwdCIgZD0iTS0uMTYyNSwwIDAtLjUgLjE2MjUsMHoiIHRyYW5zZm9ybT0ic2NhbGUoLjA2MTYpIi8+DQo8cGF0aCBmaWxsPSIjYmYwYTMwIiBpZD0ic3RyaXBlIiBkPSJtMCwwaDEyMzV2NTBoLTEyMzV6Ii8+DQo8L2RlZnM+DQo8cGF0aCBmaWxsPSIjZmZmIiBkPSJtMCwwaDEyMzV2NjUwaC0xMjM1eiIvPg0KPHVzZSB4bGluazpocmVmPSIjc3RyaXBlIi8+DQo8dXNlIHk9IjEwMCIgeGxpbms6aHJlZj0iI3N0cmlwZSIvPg0KPHVzZSB5PSIyMDAiIHhsaW5rOmhyZWY9IiNzdHJpcGUiLz4NCjx1c2UgeT0iMzAwIiB4bGluazpocmVmPSIjc3RyaXBlIi8+DQo8dXNlIHk9IjQwMCIgeGxpbms6aHJlZj0iI3N0cmlwZSIvPg0KPHVzZSB5PSI1MDAiIHhsaW5rOmhyZWY9IiNzdHJpcGUiLz4NCjx1c2UgeT0iNjAwIiB4bGluazpocmVmPSIjc3RyaXBlIi8+DQo8cGF0aCBmaWxsPSIjMDAyODY4IiBkPSJtMCwwaDQ5NHYzNTBoLTQ5NHoiLz4NCjx1c2UgeGxpbms6aHJlZj0iI3VuaW9uIiB0cmFuc2Zvcm09Im1hdHJpeCg2NTAgMCAwIDY1MCAyNDcgMTc1KSIvPg0KPC9zdmc+DQo=">
  </a>


  <a href="https://github.com/ciareis/bypass/blob/master/.github/README_pt-BR.md">
    <img height="20px" src="https://img.shields.io/badge/Português (Brasil)-flag.svg?color=555555&style=flat&logo=data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiPz4NCjxzdmcgdmVyc2lvbj0iMS4wIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB3aWR0aD0iNzIwIiBoZWlnaHQ9IjUwNCIgdmlld0JveD0iLTIxMDAgLTE0NzAgNDIwMCAyOTQwIj4NCgk8ZGVmcz4NCgkJPHBhdGggaWQ9IkQiIGQ9Ik0gLTMxLjUsMCBoIDMzIGEgMzAgMzAgMCAwIDAgMzAsLTMwIHYgLTEwIGEgMzAgMzAgMCAwIDAgLTMwLC0zMCBIIC0zMS41IHogTSAtMTguNSwtMTMgaCAxOSBhIDE5IDE5IDAgMCAwIDE5LC0xOSB2IC02IGEgMTkgMTkgMCAwIDAgLTE5LC0xOSBIIC0xOC41IHoiIGZpbGwtcnVsZT0iZXZlbm9kZCIvPg0KCQk8cGF0aCBpZD0iRSIgZD0iTSAwLDAgaCA2MyB2IC0xMyBIIDEyIHYgLTE4IGggNDAgdiAtMTIgaCAtNDAgdiAtMTQgSCA2MCB2IC0xMyBIIDAgeiIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoLTMxLjUpIi8+DQoJCTxwYXRoIGlkPSJlIiBkPSJNIC0yNi4yNSwwIGggNTIuNSB2IC0xMiBoIC00MC41IHYgLTE2IGggMzMgdiAtMTIgaCAtMzMgdiAtMTEgSCAyNSB2IC0xMiBIIC0yNi4yNSB6Ii8+DQoJCTxnIGlkPSJHIj4NCgkJCTxjbGlwUGF0aCBpZD0iZ2N1dCI+DQoJCQkJPHBhdGggZD0iTSAtMzEuNSwwIHYgLTcwIGggNjMgdiA3MCB6IE0gMCwtNDcgdiAxMiBoIDMxLjUgdiAtMTIgeiIvPg0KCQkJPC9jbGlwUGF0aD4NCgkJCTx1c2UgeGxpbms6aHJlZj0iI08iIGNsaXAtcGF0aD0idXJsKCNnY3V0KSIvPg0KCQkJPHJlY3QgeD0iNSIgeT0iLTM1IiB3aWR0aD0iMjYuNSIgaGVpZ2h0PSIxMCIvPg0KCQkJPHJlY3QgeD0iMjEuNSIgeT0iLTM1IiB3aWR0aD0iMTAiIGhlaWdodD0iMzUiLz4NCgkJPC9nPg0KCQk8cGF0aCBpZD0iTSIgZD0iTSAtMzEuNSwwIGggMTIgdiAtNDggbCAxNCw0OCBoIDExIGwgMTQsLTQ4IFYgMCBoIDEyIFYgLTcwIGggLTE3LjUgbCAtMTQsNDggbCAtMTQsLTQ4IEggLTMxLjUgeiIvPg0KCQk8cGF0aCBpZD0iTyIgZD0iTSAwLDAgYSAzMS41IDM1IDAgMCAwIDAsLTcwIGEgMzEuNSAzNSAwIDAgMCAwLDcwIE0gMCwtMTMgYSAxOC41IDIyIDAgMCAwIDAsLTQ0IGEgMTguNSAyMiAwIDAgMCAwLDQ0IiBmaWxsLXJ1bGU9ImV2ZW5vZGQiLz4NCgkJPHBhdGggaWQ9IlAiIGQ9Ik0gLTMxLjUsMCBoIDEzIHYgLTI2IGggMjggYSAyMiAyMiAwIDAgMCAwLC00NCBoIC00MCB6IE0gLTE4LjUsLTM5IGggMjcgYSA5IDkgMCAwIDAgMCwtMTggaCAtMjcgeiIgZmlsbC1ydWxlPSJldmVub2RkIi8+DQoJCTxnIGlkPSJSIj4NCgkJCTx1c2UgeGxpbms6aHJlZj0iI1AiLz4NCgkJCTxwYXRoIGQ9Ik0gMjgsMCBjIDAsLTEwIDAsLTMyIC0xNSwtMzIgaCAtMTkgYyAyMiwwIDIyLDIyIDIyLDMyIi8+DQoJCTwvZz4NCgkJPHBhdGggaWQ9IlMiIGQ9Ik0gLTE1Ljc1LC0yMiBDIC0xNS43NSwtMTUgLTksLTExLjUgMSwtMTEuNSBDIDExLC0xMS41IDE1Ljc0LC0xNC43NSAxNS43NSwtMTkuMjUgQyAxNS43NSwtMzMuNSAtMzEsLTI0LjUgLTMwLjc1LC00OS41IEMgLTMwLjUsLTcxIC02LC03MCAzLC03MCBDIDEyLC03MCAyOSwtNjYgMjguNzUsLTQ4Ljc1IEwgMTMuNSwtNDguNzUgQyAxMy41LC01Ni4yNSA2LjUsLTU5IC0xLjUsLTU5IEMgLTkuMjUsLTU5IC0xNC43NSwtNTcuNzUgLTE0Ljc1LC01MC41IEMgLTE1LC0zOC43NSAzMS41LC00Ni41IDMxLjUsLTIxLjc1IEMgMzEuNSwtMy41IDEzLjUsMCAwLDAgQyAtMTEuNSwwIC0zMS41NSwtNC41IC0zMS41LC0yMiB6Ii8+DQoJCTxnIGlkPSJzdGFyIiBmaWxsPSIjZmZmIj4NCgkJCTxnIGlkPSJjIj4NCgkJCQk8cGF0aCBpZD0idCIgZD0iTSAwLC0xIHYgMSBoIC41IiB0cmFuc2Zvcm09InJvdGF0ZSgxOCAwLC0xKSIvPg0KCQkJCTx1c2UgeGxpbms6aHJlZj0iI3QiIHRyYW5zZm9ybT0ic2NhbGUoLTEsMSkiLz4NCgkJCTwvZz4NCgkJCTx1c2UgeGxpbms6aHJlZj0iI2MiIHRyYW5zZm9ybT0icm90YXRlKDcyKSIvPg0KCQkJPHVzZSB4bGluazpocmVmPSIjYyIgdHJhbnNmb3JtPSJyb3RhdGUoLTcyKSIvPg0KCQkJPHVzZSB4bGluazpocmVmPSIjYyIgdHJhbnNmb3JtPSJyb3RhdGUoMTQ0KSIvPg0KCQkJPHVzZSB4bGluazpocmVmPSIjYyIgdHJhbnNmb3JtPSJyb3RhdGUoLTE0NCkiLz4NCgkJPC9nPg0KCQk8dXNlIGlkPSJzdGFyMSIgeGxpbms6aHJlZj0iI3N0YXIiIHRyYW5zZm9ybT0ic2NhbGUoMzEuNSkiLz4NCgkJPHVzZSBpZD0ic3RhcjIiIHhsaW5rOmhyZWY9IiNzdGFyIiB0cmFuc2Zvcm09InNjYWxlKDI2LjI1KSIvPg0KCQk8dXNlIGlkPSJzdGFyMyIgeGxpbms6aHJlZj0iI3N0YXIiIHRyYW5zZm9ybT0ic2NhbGUoMjEpIi8+DQoJCTx1c2UgaWQ9InN0YXI0IiB4bGluazpocmVmPSIjc3RhciIgdHJhbnNmb3JtPSJzY2FsZSgxNSkiLz4NCgkJPHVzZSBpZD0ic3RhcjUiIHhsaW5rOmhyZWY9IiNzdGFyIiB0cmFuc2Zvcm09InNjYWxlKDEwLjUpIi8+DQoJPC9kZWZzPg0KCTxyZWN0IHg9Ii01MCUiIHk9Ii01MCUiIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiIGZpbGw9IiMwMDliM2EiLz4NCgk8cGF0aCBkPSJNIC0xNzQzLDAgMCwxMTEzIDE3NDMsMCAwLC0xMTEzIHoiIGZpbGw9IiNmZWRmMDAiLz4NCgk8Y2lyY2xlIHI9IjczNSIgZmlsbD0iIzAwMjc3NiIvPg0KCTxjbGlwUGF0aCBpZD0iYmFuZCI+DQoJCTxjaXJjbGUgcj0iNzM1Ii8+DQoJPC9jbGlwUGF0aD4NCgk8cGF0aCBkPSJNIC0yMjA1LDE0NzAgYSAxNzg1IDE3ODUgMCAwIDEgMzU3MCwwIGggLTEwNSBhIDE2ODAgMTY4MCAwIDEgMCAtMzM2MCwwIHoiIGNsaXAtcGF0aD0idXJsKCNiYW5kKSIgZmlsbD0iI2ZmZiIvPg0KCTxnIGZpbGw9IiMwMDliM2EiIHRyYW5zZm9ybT0idHJhbnNsYXRlKC00MjAsMTQ3MCkiPg0KCQk8dXNlIHhsaW5rOmhyZWY9IiNPIiB5PSItMTY5Ny41IiB0cmFuc2Zvcm09InJvdGF0ZSgtNykiLz4NCgkJPHVzZSB4bGluazpocmVmPSIjUiIgeT0iLTE2OTcuNSIgdHJhbnNmb3JtPSJyb3RhdGUoLTQpIi8+DQoJCTx1c2UgeGxpbms6aHJlZj0iI0QiIHk9Ii0xNjk3LjUiIHRyYW5zZm9ybT0icm90YXRlKC0xKSIvPg0KCQk8dXNlIHhsaW5rOmhyZWY9IiNFIiB5PSItMTY5Ny41IiB0cmFuc2Zvcm09InJvdGF0ZSgyKSIvPg0KCQk8dXNlIHhsaW5rOmhyZWY9IiNNIiB5PSItMTY5Ny41IiB0cmFuc2Zvcm09InJvdGF0ZSg1KSIvPg0KCQk8dXNlIHhsaW5rOmhyZWY9IiNlIiB5PSItMTY5Ny41IiB0cmFuc2Zvcm09InJvdGF0ZSg5Ljc1KSIvPg0KCQk8dXNlIHhsaW5rOmhyZWY9IiNQIiB5PSItMTY5Ny41IiB0cmFuc2Zvcm09InJvdGF0ZSgxNC41KSIvPg0KCQk8dXNlIHhsaW5rOmhyZWY9IiNSIiB5PSItMTY5Ny41IiB0cmFuc2Zvcm09InJvdGF0ZSgxNy41KSIvPg0KCQk8dXNlIHhsaW5rOmhyZWY9IiNPIiB5PSItMTY5Ny41IiB0cmFuc2Zvcm09InJvdGF0ZSgyMC41KSIvPg0KCQk8dXNlIHhsaW5rOmhyZWY9IiNHIiB5PSItMTY5Ny41IiB0cmFuc2Zvcm09InJvdGF0ZSgyMy41KSIvPg0KCQk8dXNlIHhsaW5rOmhyZWY9IiNSIiB5PSItMTY5Ny41IiB0cmFuc2Zvcm09InJvdGF0ZSgyNi41KSIvPg0KCQk8dXNlIHhsaW5rOmhyZWY9IiNFIiB5PSItMTY5Ny41IiB0cmFuc2Zvcm09InJvdGF0ZSgyOS41KSIvPg0KCQk8dXNlIHhsaW5rOmhyZWY9IiNTIiB5PSItMTY5Ny41IiB0cmFuc2Zvcm09InJvdGF0ZSgzMi41KSIvPg0KCQk8dXNlIHhsaW5rOmhyZWY9IiNTIiB5PSItMTY5Ny41IiB0cmFuc2Zvcm09InJvdGF0ZSgzNS41KSIvPg0KCQk8dXNlIHhsaW5rOmhyZWY9IiNPIiB5PSItMTY5Ny41IiB0cmFuc2Zvcm09InJvdGF0ZSgzOC41KSIvPg0KCTwvZz4NCgk8dXNlIGlkPSLOsUNNaSIgeGxpbms6aHJlZj0iI3N0YXIxIiB4PSItNjAwIiB5PSItMTMyIi8+DQoJPHVzZSBpZD0izrFDTWEiIHhsaW5rOmhyZWY9IiNzdGFyMSIgeD0iLTUzNSIgeT0iMTc3Ii8+DQoJPHVzZSBpZD0izrJDTWEiIHhsaW5rOmhyZWY9IiNzdGFyMiIgeD0iLTYyNSIgeT0iMjQzIi8+DQoJPHVzZSBpZD0izrNDTWEiIHhsaW5rOmhyZWY9IiNzdGFyNCIgeD0iLTQ2MyIgeT0iMTMyIi8+DQoJPHVzZSBpZD0izrRDTWEiIHhsaW5rOmhyZWY9IiNzdGFyMiIgeD0iLTM4MiIgeT0iMjUwIi8+DQoJPHVzZSBpZD0izrVDTWEiIHhsaW5rOmhyZWY9IiNzdGFyMyIgeD0iLTQwNCIgeT0iMzIzIi8+DQoJPHVzZSBpZD0izrFWaXIiIHhsaW5rOmhyZWY9IiNzdGFyMSIgeD0iMjI4IiB5PSItMjI4Ii8+DQoJPHVzZSBpZD0izrFTY28iIHhsaW5rOmhyZWY9IiNzdGFyMSIgeD0iNTE1IiB5PSIyNTgiLz4NCgk8dXNlIGlkPSLOslNjbyIgeGxpbms6aHJlZj0iI3N0YXIzIiB4PSI2MTciIHk9IjI2NSIvPg0KCTx1c2UgaWQ9Is61U2NvIiB4bGluazpocmVmPSIjc3RhcjIiIHg9IjU0NSIgeT0iMzIzIi8+DQoJPHVzZSBpZD0izrhTY28iIHhsaW5rOmhyZWY9IiNzdGFyMiIgeD0iMzY4IiB5PSI0NzciLz4NCgk8dXNlIGlkPSLOuVNjbyIgeGxpbms6aHJlZj0iI3N0YXIzIiB4PSIzNjciIHk9IjU1MSIvPg0KCTx1c2UgaWQ9Is66U2NvIiB4bGluazpocmVmPSIjc3RhcjMiIHg9IjQ0MSIgeT0iNDE5Ii8+DQoJPHVzZSBpZD0izrtTY28iIHhsaW5rOmhyZWY9IiNzdGFyMiIgeD0iNTAwIiB5PSIzODIiLz4NCgk8dXNlIGlkPSLOvFNjbyIgeGxpbms6aHJlZj0iI3N0YXIzIiB4PSIzNjUiIHk9IjQwNSIvPg0KCTx1c2UgaWQ9Is6xSHlhIiB4bGluazpocmVmPSIjc3RhcjIiIHg9Ii0yODAiIHk9IjMwIi8+DQoJPHVzZSBpZD0izrNIeWEiIHhsaW5rOmhyZWY9IiNzdGFyMyIgeD0iMjAwIiB5PSItMzciLz4NCgk8dXNlIGlkPSLOsUNydSIgeGxpbms6aHJlZj0iI3N0YXIxIiB5PSIzMzAiLz4NCgk8dXNlIGlkPSLOskNydSIgeGxpbms6aHJlZj0iI3N0YXIyIiB4PSI4NSIgeT0iMTg0Ii8+DQoJPHVzZSBpZD0izrNDcnUiIHhsaW5rOmhyZWY9IiNzdGFyMiIgeT0iMTE4Ii8+DQoJPHVzZSBpZD0izrRDcnUiIHhsaW5rOmhyZWY9IiNzdGFyMyIgeD0iLTc0IiB5PSIxODQiLz4NCgk8dXNlIGlkPSLOtUNydSIgeGxpbms6aHJlZj0iI3N0YXI0IiB4PSItMzciIHk9IjIzNSIvPg0KCTx1c2UgaWQ9Is6xVHJBIiB4bGluazpocmVmPSIjc3RhcjIiIHg9IjIyMCIgeT0iNDk1Ii8+DQoJPHVzZSBpZD0izrJUckEiIHhsaW5rOmhyZWY9IiNzdGFyMyIgeD0iMjgzIiB5PSI0MzAiLz4NCgk8dXNlIGlkPSLOs1RyQSIgeGxpbms6aHJlZj0iI3N0YXIzIiB4PSIxNjIiIHk9IjQxMiIvPg0KCTx1c2UgaWQ9Is6xQ2FyIiB4bGluazpocmVmPSIjc3RhcjEiIHg9Ii0yOTUiIHk9IjM5MCIvPg0KCTx1c2UgaWQ9Is+DT2N0IiB4bGluazpocmVmPSIjc3RhcjUiIHk9IjU3NSIvPg0KPC9zdmc+">
  </a>
</p>

<p align="center">
    <a href="https://github.com/ciareis/bypass/actions/workflows/php.yml"><img src="https://github.com/ciareis/bypass/actions/workflows/php.yml/badge.svg?branch=main" alt="PHP Composer" style="max-width:100%;"></a>
    <a href="https://packagist.org/packages/ciareis/bypass" rel="nofollow"><img src="https://camo.githubusercontent.com/3024b39f77b85e517975221737deb700ebcdd481ede11352490b7e1fb5070563/68747470733a2f2f696d672e736869656c64732e696f2f6769746875622f762f7461672f636961726569732f627970617373" alt="GitHub tag (latest by date)" data-canonical-src="https://img.shields.io/github/v/tag/ciareis/bypass" style="max-width:100%;"></a>
    <a href="https://packagist.org/packages/ciareis/bypass" rel="nofollow"><img src="https://camo.githubusercontent.com/b690ad8b572d1f06800efc1689310f60fb40054685cfe5b2c5ab0c92035ae92d/68747470733a2f2f696d672e736869656c64732e696f2f7061636b61676973742f64742f636961726569732f627970617373" alt="Packagist Downloads" data-canonical-src="https://img.shields.io/packagist/dt/ciareis/bypass" style="max-width:100%;"></a>
    <a href="https://github.com/ciareis/bypass/blob/main/LICENSE.md"><img src="https://camo.githubusercontent.com/29b248e7925f4fc4c0c03ae49ddaf7cb4077610f49b9b23a9cf77ba92ac06ac1/68747470733a2f2f696d672e736869656c64732e696f2f7061636b61676973742f6c2f636961726569732f627970617373" alt="Packagist License" data-canonical-src="https://img.shields.io/packagist/l/ciareis/bypass" style="max-width:100%;"></a>
    <a href="https://github.com/ciareis/bypass/commits/main"><img src="https://camo.githubusercontent.com/6b2c8b26963424aa8c2a5427227f13b9a6fa9d4ca7e81e6ce117027c133fbd8c/68747470733a2f2f696d672e736869656c64732e696f2f6769746875622f6c6173742d636f6d6d69742f636961726569732f6279706173732e737667" alt="Last Updated" data-canonical-src="https://img.shields.io/github/last-commit/ciareis/bypass.svg" style="max-width:100%;"></a>
</p>

------

## About

<table>
    <tr>
        <td>
            Bypass for PHP provides a quick way to create a custom HTTP Server to return predefined responses to client requests.<br><br>This is useful in tests when your application make requests to external services, and you need to simulate different situations like returning specific data or unexpected server errors.
        </td>
    </tr>
</table>

------

## Installation

📌 Bypass requires PHP 8.0+.

To install via [composer](https://getcomposer.org), run the following command:

```bash
composer require --dev ciareis/bypass
```

------

## Writing Tests

### Content

- [Open Bypass](#1-open-a-bypass-service)
- [Retrieve Bypass URL](#2-bypass-url-and-port)
- Routes
    - [Standard Route](#31-standard-route)
    - [File Route](#32-file-route)
- [Assert Route](#4-asserting-route-calling)
- [Stop or shutdown](#5-stop-or-shutdown)

📝 Note: If you wish to view full codes, head to the [Examples](#examples) section.

### 1. Open a Bypass Service

To write a test, first open a Bypass server:

```php
//Opens a new Bypass server
$bypass = Bypass::open();
```

Bypass will always run at `http://localhost` listening to a random port number.

If needed, a port can be specified passing it as an argument `(int) $port`:

```php
//Opens a new Bypass using port 8081
$bypass = Bypass::open(8081);
```

### 2. Bypass URL and Port

The Bypass server URL can be retrieved with `getBaseUrl()`:

 ```php
 $bypassUrl = $bypass->getBaseUrl(); //for example: http://localhost:16819
 ````

If you need to retrieve only the port number, use the `getPort()` method:

 ```php
 $bypassPort = $bypass->getPort(); //for example: 16819
 ````

### 3. Routes

Bypass serves two types of routes: The `Standard Route`, which can return a text body content and the `File Route`, which returns a binary file.

When running your tests, you will inform Bypass routes to Application or Service, making it access Bypass URLs instead of the real-world URLs.

#### 3.1 Standard Route

```php
//Route retuning a JSON body with HTTP Status 200
$bypass->addRoute(method: 'get', uri: '/v1/demo', status: 200, body: '{"name": "John", "total": 1250}');

//Instantiates a DemoService class
$service = new DemoService();

//Consumes the service using the Bypass URL
$response = $service->setBaseUrl($bypass->getBaseUrl())->getTotal();

//Test Assertions...
```

The method `addRoute()` accepts the following parameters:

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| **HTTP Method** | `int $method` | [HTTP Request Method](https://www.w3.org/Protocols/rfc2616/rfc2616-sec9.html) (GET/POST/PUT/PATCH/DELETE). |
| **URI** | `string $uri` | URI to be served by Bypass |
| **Status** | `string $status` | [HTTP Status Code](https://www.w3.org/Protocols/rfc2616/rfc2616-sec10.html)  to be returned by Bypass (default: 200) |
| **Body** | `string $body` | Body to be served by Bypass (optional) |
| **Times** | `int $times` | How many times the route should be called (default: 1) |

#### 3.2 File Route

```php
//Reads a PDF file
$demoFile = \file_get_contents('storage/pdfs/demo.pdf');

//File Route returning a binary file with HTTP Status 200
$bypass->addFileRoute(method: 'get', uri: '/v1/myfile', status: 200, file: $demoFile);

//Instantiates a DemoService class
$service = new DemoService();

//Consumes the service using the Bypass URL
$response = $service->setBaseUrl($bypass->getBaseUrl())->getPdf();

//Test Assertions...
```

The method `addFileRoute()` accepts the following parameters:

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| **HTTP Method** | `int $method` | [HTTP Request Method](https://www.w3.org/Protocols/rfc2616/rfc2616-sec9.html) (GET/POST/PUT/PATCH/DELETE). |
| **URI** | `string $uri` | URI to be served by Bypass |
| **Status** | `string $status` | [HTTP Status Code](https://www.w3.org/Protocols/rfc2616/rfc2616-sec10.html)  to be returned by Bypass (default: 200) |
| **Body** | `string $body` | Binary file to be served by Bypass |
| **Times** | `int $times` | How many times the route should be called (default: 1) |

### 4. Asserting Route Calling

You might need to assert that a route was called at least one or multiple times.

The method `assertRoute()` will return a `RouteNotCalledException` if a route was called as many times as defined in the `$time` parameter.

 ```php
//Defines a route which must be called two times
$bypass->addRoute(method: 'get', uri: '/v1/demo', status: 200, body: '{"name": "John", "total": 1250}', times: 2);

//Instantiates a DemoService class
$service = new DemoService();

//Consumes the service using the Bypass URL
$response = $service->setBaseUrl($bypass->getBaseUrl())->getTotal();

$bypass->assertRoutes();

//Test Assertions...

````

### 5. Stop or shutdown

Bypass can be stopped or shutdown with the following methods:

To stop:
`$bypass->stop();`

To shutdown:
`$bypass->down();`

## Examples

### Use case

To better illustrate Bypass usage, imagine you need to write a test for a service called `TotalScoreService`. This service calculates the total game score of a given username.
To get the score is obtained making external request to a fictitious API at `emtudo-games.com/v1/score/::USERNAME::`. The API returns HTTP Status `200` and a JSON body with a list of games:

```json
{
  "games": [
    {
      "id": 2,
      "points": 25
    },
    {
      "id": 2,
      "points": 10
    }
  ],
  "is_active": true
}
```

```php
//Opens a new Bypass server
$bypass = Bypass::open();

//Retrieves the Bypass URL
$bypassUrl = $bypass->getBaseUrl();

//Json body
$body = '{"games":[{"id":1,"points":25},{"id": 2,"points":10}],"is_active":true}';

//Defines a route
$bypass->addRoute(method: 'get', uri: '/v1/score', status: 200, body: $body);
    
//Instantiates a TotalScoreService
$service = new TotalScoreService();

//Consumes the service using the Bypass URL
$response = $serivce
    ->setBaseUrl($bypassUrl) // set the URL to the Bypass URL
    ->getTotalScoreByUsername("johndoe"); //returns 35

//Verifies that response is 35
expect($response)->toBe(35); //Pest PHP test
```

### Quick Test Examples

Click below to see code snippets for [Pest PHP](https://pestphp.com) and PHPUnit.

<details><summary>Pest PHP</summary>

```php
it('properly returns the total score by username', function () {
  
    //Opens a new Bypass server
    $bypass = Bypass::open();
    
    //Json body
    $body = '{"games":[{"id":1,"points":25},{"id": 2,"points":10}],"is_active":true}';
    
    //Defines a route
    $bypass->addRoute(method: 'get', uri: '/v1/score', status: 200, body: $body);
    
    //Instantiates and consumes the service using the Bypass URL
    $service = new TotalScoreService();
    $response = $service
        ->setBaseUrl($bypass->getBaseUrl())
        ->getTotalScoreByUsername("johndoe");

    //Verifies that response is 35
    expect($response)->toBe(35);
});

it('properly gets the logo', function () {
  
    //Opens a new Bypass server
    $bypass = Bypass::open();

    //Reads the file
    $filePath = 'docs/img/logo.png';
    $file = \file_get_contents($filePath);

    //Defines a route
    $bypass->addFileRoute(method: 'get', uri: $filePath, status: 200, file: $file);

    //Instantiates and consumes the service using the Bypass URL
    $service = new LogoService();
    $response = $service->setBaseUrl($bypass->getBaseUrl())->getLogo();

    // asserts
    expect($response)->toEqual($file);
});
```

</details>

<details><summary>PHPUnit</summary>

```php
 class BypassTest extends TestCase
  {
    public function test_total_score_by_username(): void
    {
  
        //Opens a new Bypass server
        $bypass = Bypass::open();
        
        //Json body
        $body = '{"games":[{"name":"game 1","points":25},{"name":"game 2","points":10}],"is_active":true}';
        //Defines a route

        $bypass->addRoute(method: 'get', uri: '/v1/score', status: 200, body: $body);
           //Instantiates and consumes the service using the Bypass URL

        $service = new TotalScoreService();
        $response = $service
            ->setBaseUrl($bypass->getBaseUrl())
            ->getTotalScoreByUsername("johndoe");
        
        //Verifies that response is 35 
        $this->assertSame(35, $response);
    
    }
    public function test_gets_logo(): void
    {

        //Opens a new Bypass server
        $bypass = Bypass::open();

        //Reads the file
        $filePath = 'docs/img/logo.png';
        $file = \file_get_contents($filePath);

        //Defines a route
        $bypass->addFileRoute(method: 'get', uri: $filePath, status: 200, file: $file);

        //Instantiates and consumes the service using the Bypass URL
        $service = new LogoService();
        $response = $service->setBaseUrl($bypass->getBaseUrl())->getLogo();

        $this->assertSame($response, $file);
     }
 }
```

</details>

### Test Examples

📚 See Bypass being used in complete tests with [Pest PHP](https://github.com/ciareis/bypass/blob/main/tests/BypassPestTest.php) and [PHPUnit](https://github.com/ciareis/bypass/blob/main/tests/BypassTest.php).

## Credits

- [Leandro Henrique](https://github.com/emtudo)
- [All Contributors](../../contributors)

And a special thanks to [@DanSysAnalyst](https://github.com/dansysanalyst) for the documentation

### Inspired

Code inspired by [Bypass](https://github.com/PSPDFKit-labs/bypass)