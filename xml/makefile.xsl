<?xml version="1.0" encoding="UTF-8" ?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/TR/WD-xsl">
<xsl:template match="/">
    <html>
        <body>
            <table border="0" cellspacing="1" cellpadding="0" bgcolor="black">
                <xsl:for-each select="자기소개서">
                    <tr bgcolor="white"><td align="center"><b>이름</b></td><td><xsl:value-of select="이름"/></td></tr>
                    <tr bgcolor="white"><th>성별</th><td width="500"><xsl:value-of select="성별"/></td></tr>
                    <tr bgcolor="white"><th width="100">나이</th><td><xsl:value-of select="나이"/></td></tr>
                    <tr bgcolor="white"><th>주소</th><td width="500"><xsl:value-of select="주소"/></td></tr>
                </xsl:for-each>
            </table>
        </body>
    </html>
</xsl:template>
</xsl:stylesheet>