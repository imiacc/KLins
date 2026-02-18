document.addEventListener('DOMContentLoaded', function() {
    const inkColors = ['#2c3e50', '#5a6c7d', '#8fa3b8', '#b8c5d4'];
    
    function createSVGTriangle(size, rotation, isFilled, color) {
        const svg = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
        svg.setAttribute('width', size);
        svg.setAttribute('height', size);
        svg.setAttribute('viewBox', '0 0 100 100');
        svg.style.position = 'absolute';
        
        const polygon = document.createElementNS('http://www.w3.org/2000/svg', 'polygon');
        
        const points = '50,10 90,90 10,90';
        polygon.setAttribute('points', points);
        
        if (isFilled) {
            polygon.setAttribute('fill', color);
            polygon.setAttribute('fill-opacity', '0.6');
            polygon.setAttribute('stroke', 'none');
        } else {
            polygon.setAttribute('fill', 'none');
            polygon.setAttribute('stroke', color);
            polygon.setAttribute('stroke-width', '2');
            polygon.setAttribute('stroke-opacity', '0.5');
        }
        
        svg.appendChild(polygon);
        return svg;
    }
    
    function createRandomTriangle() {
        const triangle = document.createElement('div');
        triangle.className = 'random-triangle';
        
        const size = Math.random() * 40 + 20;
        const x = Math.random() * window.innerWidth;
        const y = Math.random() * window.innerHeight;
        const rotation = Math.random() * 360;
        const color = inkColors[Math.floor(Math.random() * inkColors.length)];
        const isFilled = Math.random() < 0.3;
        
        const svgTriangle = createSVGTriangle(size, rotation, isFilled, color);
        svgTriangle.style.left = `${x}px`;
        svgTriangle.style.top = `${y}px`;
        svgTriangle.style.transformOrigin = 'center center';
        svgTriangle.style.transform = `rotate(${rotation}deg)`;
        svgTriangle.style.transition = 'transform 15s linear';
        
        triangle.appendChild(svgTriangle);
        document.body.appendChild(triangle);
        
        setTimeout(() => {
            svgTriangle.style.transform = `rotate(${rotation + 180}deg)`;
        }, 100);
        
        setTimeout(() => {
            triangle.style.opacity = '0';
            setTimeout(() => {
                triangle.remove();
            }, 300);
        }, 8000 + Math.random() * 4000);
    }
    
    const triangleAnimationEnabled = document.body.getAttribute('data-triangle-animation') === '1';
    const triangleDensity = document.body.getAttribute('data-triangle-density') || 'medium';
    
    if (triangleAnimationEnabled) {
        let intervalTime = 2500;
        if (triangleDensity === 'low') intervalTime = 4000;
        if (triangleDensity === 'high') intervalTime = 1500;
        
        setInterval(createRandomTriangle, intervalTime);
        
        for (let i = 0; i < 5; i++) {
            setTimeout(createRandomTriangle, i * 600);
        }
    }
    
    document.addEventListener('click', function(e) {
        const clickTriangle = document.createElement('div');
        clickTriangle.className = 'click-triangle';
        
        const size = Math.random() * 7 + 5;
        const color = inkColors[Math.floor(Math.random() * inkColors.length)];
        const isFilled = Math.random() < 0.4;
        
        const svgTriangle = createSVGTriangle(size, 0, isFilled, color);
        svgTriangle.style.left = `${e.clientX - size / 2}px`;
        svgTriangle.style.top = `${e.clientY - size / 2}px`;
        
        clickTriangle.appendChild(svgTriangle);
        document.body.appendChild(clickTriangle);
        
        setTimeout(() => {
            clickTriangle.remove();
        }, 400);

        const dotCount = Math.floor(Math.random() * 8) + 5;
        const dotColor = inkColors[Math.floor(Math.random() * inkColors.length)];
        
        for (let i = 0; i < dotCount; i++) {
            const dot = document.createElement('div');
            dot.className = 'click-dot';
            
            const angle = (Math.PI * 2 * i) / dotCount + Math.random() * 0.5;
            const distance = Math.random() * 30 + 10;
            const dotSize = Math.random() * 3 + 1;
            
            dot.style.width = `${dotSize}px`;
            dot.style.height = `${dotSize}px`;
            dot.style.backgroundColor = dotColor;
            dot.style.left = `${e.clientX}px`;
            dot.style.top = `${e.clientY}px`;
            dot.style.position = 'absolute';
            dot.style.borderRadius = '50%';
            dot.style.pointerEvents = 'none';
            dot.style.zIndex = '1000';
            dot.style.opacity = '0.8';
            
            document.body.appendChild(dot);
            
            setTimeout(() => {
                const targetX = e.clientX + Math.cos(angle) * distance;
                const targetY = e.clientY + Math.sin(angle) * distance;
                
                dot.style.transition = 'all 0.3s ease-out';
                dot.style.left = `${targetX}px`;
                dot.style.top = `${targetY}px`;
                dot.style.opacity = '0';
            }, 10);
            
            setTimeout(() => {
                dot.remove();
            }, 320);
        }
    });
    
    const links = document.querySelectorAll('a, button');
    links.forEach(link => {
        link.addEventListener('mouseenter', function(e) {
            const hoverTriangle = document.createElement('div');
            hoverTriangle.className = 'click-triangle';
            
            const size = 8;
            const color = inkColors[Math.floor(Math.random() * inkColors.length)];
            const isFilled = Math.random() < 0.3;
            
            const svgTriangle = createSVGTriangle(size, 0, isFilled, color);
            svgTriangle.style.left = `${e.clientX - size / 2}px`;
            svgTriangle.style.top = `${e.clientY - size / 2}px`;
            
            hoverTriangle.appendChild(svgTriangle);
            document.body.appendChild(hoverTriangle);
            
            setTimeout(() => {
                hoverTriangle.remove();
            }, 300);
        });
    });

    generateTableOfContents();
    updateReadingInfo();
    observeScrollForTOC();
    initCodeHighlighting();
});

function initCodeHighlighting() {
    const codeHighlightEnabled = document.body.getAttribute('data-code-highlight') === '1';
    if (!codeHighlightEnabled) return;

    if (typeof hljs !== 'undefined') {
        document.querySelectorAll('pre code').forEach((block) => {
            hljs.highlightElement(block);
        });
    }

    addCopyButtons();
}

function addCopyButtons() {
    const codeBlocks = document.querySelectorAll('pre');
    codeBlocks.forEach(pre => {
        if (pre.querySelector('.copy-button')) return;

        const copyButton = document.createElement('button');
        copyButton.className = 'copy-button';
        copyButton.textContent = '复制';
        copyButton.type = 'button';

        copyButton.addEventListener('click', function() {
            const code = pre.querySelector('code');
            const text = code.textContent;

            navigator.clipboard.writeText(text).then(() => {
                copyButton.textContent = '已复制';
                setTimeout(() => {
                    copyButton.textContent = '复制';
                }, 2000);
            }).catch(err => {
                copyButton.textContent = '失败';
                setTimeout(() => {
                    copyButton.textContent = '复制';
                }, 2000);
            });
        });

        pre.style.position = 'relative';
        pre.appendChild(copyButton);
    });
}

function generateTableOfContents() {
    const postContent = document.querySelector('.post-content');
    if (!postContent) return;

    const tocEnabled = document.body.getAttribute('data-toc-enabled') === '1';
    if (!tocEnabled) return;

    const headings = postContent.querySelectorAll('h1, h2, h3, h4, h5, h6');
    if (headings.length === 0) return;

    const tocContainer = document.createElement('div');
    tocContainer.className = 'article-toc';
    tocContainer.innerHTML = '<h3 class="toc-title">目录</h3>';

    const tocList = document.createElement('ul');
    tocList.className = 'toc-list';

    let currentLevel = null;
    let currentList = tocList;
    const listStack = [tocList];

    headings.forEach((heading, index) => {
        const level = parseInt(heading.tagName.substring(1));
        const id = `heading-${index}`;
        heading.id = id;

        const li = document.createElement('li');
        li.className = `toc-item toc-level-${level}`;

        const link = document.createElement('a');
        link.href = `#${id}`;
        link.textContent = heading.textContent;
        link.className = 'toc-link';
        link.dataset.target = id;

        li.appendChild(link);

        if (currentLevel === null) {
            currentList.appendChild(li);
            currentLevel = level;
        } else if (level > currentLevel) {
            const nestedList = document.createElement('ul');
            nestedList.className = 'toc-list';
            const lastLi = currentList.lastElementChild;
            if (lastLi) {
                lastLi.appendChild(nestedList);
                listStack.push(nestedList);
                currentList = nestedList;
            }
            currentList.appendChild(li);
        } else if (level < currentLevel) {
            while (listStack.length > 0) {
                listStack.pop();
                currentList = listStack[listStack.length - 1];
                if (currentList && parseInt(currentList.parentElement?.className?.split(' ')[1]?.split('-')[1] || '0') < level) {
                    break;
                }
            }
            currentList = listStack[listStack.length - 1] || tocList;
            currentList.appendChild(li);
        } else {
            currentList.appendChild(li);
        }

        currentLevel = level;
    });

    tocContainer.appendChild(tocList);

    const tocButton = document.createElement('button');
    tocButton.className = 'toc-toggle-button';
    tocButton.innerHTML = '目录';
    tocButton.type = 'button';

    const tocPopup = document.createElement('div');
    tocPopup.className = 'toc-popup';
    tocPopup.style.display = 'none';
    tocPopup.appendChild(tocContainer);

    document.body.appendChild(tocButton);
    document.body.appendChild(tocPopup);

    let isTocVisible = false;

    tocButton.addEventListener('click', function(e) {
        e.stopPropagation();
        isTocVisible = !isTocVisible;
        if (isTocVisible) {
            tocPopup.style.display = 'block';
            const buttonRect = tocButton.getBoundingClientRect();
            tocPopup.style.top = `${buttonRect.bottom + 10}px`;
            tocPopup.style.right = '20px';
        } else {
            tocPopup.style.display = 'none';
        }
    });

    document.addEventListener('click', function(e) {
        if (isTocVisible && !tocPopup.contains(e.target) && e.target !== tocButton) {
            isTocVisible = false;
            tocPopup.style.display = 'none';
        }
    });

    const articleInfo = document.createElement('div');
    articleInfo.className = 'article-info';
    
    const readingTime = document.querySelector('.reading-time');
    const wordCount = document.querySelector('.word-count');
    
    if (readingTime || wordCount) {
        const infoList = document.createElement('ul');
        infoList.className = 'info-list';
        
        if (readingTime) {
            const li = document.createElement('li');
            li.innerHTML = `<span class="info-label">阅读时间:</span> ${readingTime.textContent}`;
            infoList.appendChild(li);
        }
        
        if (wordCount) {
            const li = document.createElement('li');
            li.innerHTML = `<span class="info-label">字数:</span> ${wordCount.textContent}`;
            infoList.appendChild(li);
        }
        
        articleInfo.appendChild(infoList);
    }

    const sidebar = document.querySelector('.article-sidebar');
    if (sidebar && articleInfo.children.length > 0) {
        sidebar.appendChild(articleInfo);
    }
}

function updateReadingInfo() {
    const postContent = document.querySelector('.post-content');
    if (!postContent) return;

    const showReadingTime = document.body.getAttribute('data-show-reading-time') === '1';
    const showWordCount = document.body.getAttribute('data-show-word-count') === '1';

    if (!showReadingTime && !showWordCount) return;

    const text = postContent.innerText || postContent.textContent;
    const wordCount = text.length;
    const readingTime = Math.ceil(wordCount / 400);

    const metaDiv = document.querySelector('.post-meta');
    if (metaDiv) {
        if (showWordCount) {
            const wordCountSpan = document.createElement('span');
            wordCountSpan.className = 'word-count';
            wordCountSpan.textContent = `${wordCount} 字`;
            metaDiv.appendChild(wordCountSpan);
        }

        if (showReadingTime) {
            const readingTimeSpan = document.createElement('span');
            readingTimeSpan.className = 'reading-time';
            readingTimeSpan.textContent = `${readingTime} 分钟`;
            metaDiv.appendChild(readingTimeSpan);
        }
    }
}

function observeScrollForTOC() {
    const tocLinks = document.querySelectorAll('.toc-link');
    if (tocLinks.length === 0) return;

    const headings = Array.from(document.querySelectorAll('.post-content h1, .post-content h2, .post-content h3, .post-content h4, .post-content h5, .post-content h6'));

    const observerOptions = {
        root: null,
        rootMargin: '-10% 0px -70% 0px',
        threshold: 0
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const id = entry.target.id;
                tocLinks.forEach(link => {
                    link.classList.remove('active');
                    if (link.dataset.target === id) {
                        link.classList.add('active');
                    }
                });
            }
        });
    }, observerOptions);

    headings.forEach(heading => {
        observer.observe(heading);
    });
}
