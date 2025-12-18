(function () {
  const s = document.createElement("link").relList;
  if (s && s.supports && s.supports("modulepreload")) return;
  for (const n of document.querySelectorAll('link[rel="modulepreload"]')) o(n);
  new MutationObserver((n) => {
    for (const c of n)
      if (c.type === "childList")
        for (const e of c.addedNodes)
          e.tagName === "LINK" && e.rel === "modulepreload" && o(e);
  }).observe(document, { childList: !0, subtree: !0 });
  function i(n) {
    const c = {};
    return (
      n.integrity && (c.integrity = n.integrity),
      n.referrerPolicy && (c.referrerPolicy = n.referrerPolicy),
      n.crossOrigin === "use-credentials"
        ? (c.credentials = "include")
        : n.crossOrigin === "anonymous"
        ? (c.credentials = "omit")
        : (c.credentials = "same-origin"),
      c
    );
  }
  function o(n) {
    if (n.ep) return;
    n.ep = !0;
    const c = i(n);
    fetch(n.href, c);
  }
})();
let y = !1,
  h;
function L(r) {
  if (y || !r) return;
  const s = r.closest("header"),
    i = s == null ? void 0 : s.querySelector(".menu"),
    o = r.closest("body");
  (y = !0),
    r.classList.contains("active")
      ? (r.classList.add("reverse"),
        r.classList.remove("active"),
        i == null || i.classList.remove("active"),
        o == null || o.classList.remove("active"))
      : ((h = function (n) {
          b.call(this, n, i);
        }),
        r.addEventListener("animationend", h),
        r.classList.add("active"),
        i == null || i.classList.add("is-animating"),
        i == null || i.classList.add("active"),
        o == null || o.classList.add("active"));
}
function b({ animationName: r }, s) {
  r.startsWith("burger-active-rotate-bottom")
    ? (y = !1)
    : r.startsWith("burger-reverse-opacity-middle") &&
      (this.removeEventListener("animationend", h),
      this.classList.remove("active", "reverse"),
      s == null || s.classList.remove("is-animating"),
      (y = !1));
}
const A = "modulepreload",
  O = function (r, s) {
    return new URL(r, s).href;
  },
  E = {},
  u = function (s, i, o) {
    let n = Promise.resolve();
    if (i && i.length > 0) {
      let e = function (l) {
        return Promise.all(
          l.map((m) =>
            Promise.resolve(m).then(
              (p) => ({ status: "fulfilled", value: p }),
              (p) => ({ status: "rejected", reason: p })
            )
          )
        );
      };
      const t = document.getElementsByTagName("link"),
        a = document.querySelector("meta[property=csp-nonce]"),
        f =
          (a == null ? void 0 : a.nonce) ||
          (a == null ? void 0 : a.getAttribute("nonce"));
      n = e(
        i.map((l) => {
          if (((l = O(l, o)), l in E)) return;
          E[l] = !0;
          const m = l.endsWith(".css"),
            p = m ? '[rel="stylesheet"]' : "";
          if (!!o)
            for (let v = t.length - 1; v >= 0; v--) {
              const _ = t[v];
              if (_.href === l && (!m || _.rel === "stylesheet")) return;
            }
          else if (document.querySelector(`link[href="${l}"]${p}`)) return;
          const d = document.createElement("link");
          if (
            ((d.rel = m ? "stylesheet" : A),
            m || (d.as = "script"),
            (d.crossOrigin = ""),
            (d.href = l),
            f && d.setAttribute("nonce", f),
            document.head.appendChild(d),
            m)
          )
            return new Promise((v, _) => {
              d.addEventListener("load", v),
                d.addEventListener("error", () =>
                  _(new Error(`Unable to preload CSS for ${l}`))
                );
            });
        })
      );
    }
    function c(e) {
      const t = new Event("vite:preloadError", { cancelable: !0 });
      if (((t.payload = e), window.dispatchEvent(t), !t.defaultPrevented))
        throw e;
    }
    return n.then((e) => {
      for (const t of e || []) t.status === "rejected" && c(t.reason);
      return s().catch(c);
    });
  },
  w = (r, s, i) => {
    const o = r[s];
    return o
      ? typeof o == "function"
        ? o()
        : Promise.resolve(o)
      : new Promise((n, c) => {
          (typeof queueMicrotask == "function" ? queueMicrotask : setTimeout)(
            c.bind(
              null,
              new Error(
                "Unknown variable dynamic import: " +
                  s +
                  (s.split("/").length !== i
                    ? ". Note that variables only represent file names one level deep."
                    : "")
              )
            )
          );
        });
  };
async function g(r) {
  for (const s of document.querySelectorAll("*"))
    for (const i of s.attributes)
      if (
        i.name.startsWith("data-fsc-") &&
        !i.name.replace(/data-fsc-[^-]+/, "").includes("-")
      ) {
        const o = i.name.replace("data-fsc-", "");
        if (r.has(o)) continue;
        try {
          const n = await w(
            Object.assign({
              "../accordion/accordion.ts": () =>
                u(() => import("./accordion-B7JpTlV8.js"), [], import.meta.url),
              "../combobox/combobox.ts": () =>
                u(() => import("./combobox-Cw5DhSh7.js"), [], import.meta.url),
              "../counter/counter.ts": () =>
                u(() => import("./counter-Dq7TBerS.js"), [], import.meta.url),
              "../dummyaside/dummyaside.ts": () =>
                u(
                  () => import("./dummyaside-DLNR1YXg.js"),
                  [],
                  import.meta.url
                ),
              "../dynamic/dynamic.ts": () =>
                u(() => import("./dynamic-D1Nv8-bA.js"), [], import.meta.url),
              "../marquee/marquee.ts": () =>
                u(() => import("./marquee-ByWqM2uD.js"), [], import.meta.url),
              "../phpmailer/phpmailer.ts": () =>
                u(() => import("./phpmailer-isrLjcAj.js"), [], import.meta.url),
              "../scroll/scroll.ts": () =>
                u(() => import("./scroll-B23u_HUx.js"), [], import.meta.url),
              "../watcher/watcher.ts": () =>
                u(() => import("./watcher-CgkinOyq.js"), [], import.meta.url),
            }),
            `../${o}/${o}.ts`,
            3
          );
          r.set(o, n);
        } catch (n) {
          console.log(`@/plugins/${o}/${o}.ts`),
            console.warn(`❌ Component "${o}" failed to load`, n);
        }
      }
}
window.addEventListener("click", function (r) {
  const s = r.target.closest(".burger");
  s && L(s);
});
document.fonts.ready.then(async () => {
  const r = new Map();
  await g(r),
    Array.from(r)
      .map(([e, t]) => (t == null ? void 0 : t[`${e}Autoload`]))
      .filter((e) => typeof e == "function")
      .forEach((e) => e());
  const s = Array.from(r)
      .filter(([e, t]) => typeof t[`${e}ClickArray`] == "object")
      .map((e) => ({
        func: e[1][`${e[0]}ClickArray`][0],
        elementSelector: e[1][`${e[0]}ClickArray`][1] || `[data-fsc-${e[0]}]`,
      })),
    i = Object.fromEntries(
      Array.from(r)
        .filter(([e, t]) => typeof t[`${e}ObserverArray`] == "object")
        .map(([e, t]) => [
          e,
          {
            func: t[`${e}ObserverArray`][0],
            elementSelector: t[`${e}ObserverArray`][1] || `[data-fsc-${e}]`,
          },
        ])
    ),
    o = Array.from(r)
      .filter(([e, t]) => typeof t[`${e}OnSubmit`] == "function")
      .map((e) => [e[0], e[1][`${e[0]}OnSubmit`]]),
    n = Array.from(r)
      .filter(([e, t]) => typeof t[`${e}OnResize`] == "function")
      .map((e) => [e[0], e[1][`${e[0]}OnResize`]]),
    c = new IntersectionObserver((e) => {
      e.forEach((t) => {
        const a = Array.from(t.target.attributes)
          .map((f) => f.name)
          .filter((f) => /^data-fsc-[^-]+$/.test(f))
          .map((f) => f.slice(9))[0];
        i[a].func(t, c);
      });
    }, {});
  for (const e of Object.values(i))
    document.querySelectorAll(e.elementSelector).forEach((t) => c.observe(t));
  window.addEventListener("click", function (e) {
    s.forEach((t) => {
      const a = e.target.closest(t.elementSelector);
      a && t.func(a);
    });
  }),
    window.addEventListener("resize", function (e) {
      n.forEach((t) => t[1]());
    }),
    window.addEventListener("submit", function (e) {
      o.forEach((t) => t[1](e));
    });
});
