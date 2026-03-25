let c=[];const u=[h,"[data-fsc-accordion-touch]"];function h(o){const s=window.matchMedia("(hover: hover) and (pointer: fine)").matches,t=o.closest("[data-fsc-accordion]"),r=t==null?void 0:t.getAttribute("data-fsc-accordion-behaviour"),d=t==null?void 0:t.getAttribute("data-fsc-accordion-media-query");if(t&&d&&!window.matchMedia(`(${d})`).matches||s)return;r!=="default"&&(c.forEach(e=>{e.hasAttribute("style")&&e.removeAttribute("style"),!e.isSameNode(t)&&e.hasAttribute("data-fsc-accordion-active")&&!e.hasAttribute("data-fsc-accordion-behaviour")&&e.removeAttribute("data-fsc-accordion-active")}),c=[],c.push(t));const a=t.querySelector("[data-fsc-accordion-body]")||o.querySelector(".accordion__body"),i=a.cloneNode(!0);t.toggleAttribute("data-fsc-accordion-active"),i.style.cssText=`
        opacity: 1;
        visibility: visible;
        height: max-content;
        max-height: unset;
    `,t.append(i);const n=window.getComputedStyle(i).height;i.remove(),t.hasAttribute("data-fsc-accordion-active")?(a.style.maxHeight=n,a.style.height="max-content",r!=="default"&&c.push(a)):a.removeAttribute("style")}export{u as accordionIconClickArray};
