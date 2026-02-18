@echo off
chcp 65001 >nul
echo ========================================
echo   水墨三角形主题 - 打包脚本
echo ========================================
echo.

if not exist "KLins" (
    echo 错误：找不到 KLins 文件夹！
    echo 请确保在正确的目录下运行此脚本。
    pause
    exit /b 1
)

echo 正在检查文件...
echo.

set "files=index.php archive.php page.php post.php header.php footer.php sidebar.php comments.php functions.php style.css script.js README.md INSTALL.md"
set "missing="

for %%f in (%files%) do (
    if not exist "KLins\%%f" (
        set "missing=!missing! %%f"
    )
)

if defined missing (
    echo 错误：缺少以下文件：
    echo!missing!
    echo.
    echo 请确保所有文件都在 KLins 文件夹中。
    pause
    exit /b 1
)

echo ✓ 所有必需文件都存在
echo.

set "version=1.0.0"
set "zipname=KLins-v%version%.zip"

if exist "%zipname%" (
    echo 警告：%zipname% 已存在，将被覆盖。
    del "%zipname%"
)

echo 正在打包主题...
echo.

powershell -Command "Compress-Archive -Path 'KLins\*' -DestinationPath '%zipname%' -Force"

if exist "%zipname%" (
    echo ✓ 打包成功！
    echo.
    echo 压缩包名称：%zipname%
    echo.
    echo 文件列表：
    powershell -Command "Get-ChildItem 'KLins' | Select-Object Name, Length | Format-Table -AutoSize"
    echo.
    echo ========================================
    echo   打包完成！
    echo ========================================
    echo.
    echo 下一步：
    echo 1. 将 %zipname% 上传到 Typecho 主题目录
    echo 2. 或在 Typecho 后台上传主题
    echo 3. 启用主题并配置
    echo.
) else (
    echo ✗ 打包失败！
    echo 请检查 PowerShell 是否可用。
)

pause
